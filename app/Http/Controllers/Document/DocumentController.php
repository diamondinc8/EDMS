<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Act;
use App\Models\Company;
use App\Models\CompanyContractors;
use App\Models\CompanyRole;
use App\Models\Document;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends BaseController
{

    public function getCompanyNameAndTin($company_id)
    {
        $company_name_and_tin = Company::select('name', 'tin')->find($company_id)?->only(['name', 'tin']);
        return $company_name_and_tin;
    }

    public function getRecipientCompany($company_id)
    {
        $company_contractors = CompanyContractors::where('company_id', $company_id)->pluck('company_contractor_id');

        $company_contractors = Company::whereIn('id', $company_contractors)->get(['id', 'tin', 'name'])->toArray();

        return $company_contractors;
    }

    public function getUserNameAndPost($user_id)
    {
        $user = User::find($user_id)->only(['name', 'surname', 'patronymic']);

        $role_id = CompanyRole::where('user_id', $user_id)->value('role_id');
        $text_role = Role::find($role_id)->value('name');

        return [
            'name' => $user['name'],
            'surname' => $user['surname'],
            'patronymic' => $user['patronymic'],
            'role' => $text_role
        ];
    }

    public function index()
    {
        $company_id = Auth::company_id();

        $received_documents_info_non_validate = Document::where('recipient_company_id', $company_id)->orderBy('id', 'desc')->get(['sender_id', 'id_in_category', 'type', 'company_sender_id', 'status']);
        $received_documents_info = [];

        foreach ($received_documents_info_non_validate as $document_info) {
            switch ($document_info['type']) {
                case 'act':
                    $act = Act::find($document_info['id_in_category']);
                    $user_id = $document_info['sender_id'];

                    $sender_company_name = $this->getCompanyNameAndTin($document_info['company_sender_id'])['name'];
                    $received_documents_info[] = [
                        'document_number' => $act->document_number,
                        'document_type' => "Акт",
                        'creator' => $this->getUserNameAndPost($user_id)['name'] . ' ' . $this->getUserNameAndPost($user_id)['surname'] . ', ' . $this->getUserNameAndPost($user_id)['role'],
                        'sender_company_name' => $sender_company_name,
                        'sender_company_id' => $document_info['company_sender_id'],
                        'status' => $document_info['status']
                    ];

                    break;
            }
        }
        // dd($received_documents_info);
        return view('documents.index', compact('received_documents_info'));
    }

    public function submitted()
    {
        $company_id = Auth::company_id();

        $submitted_documents_info = Document::where('company_sender_id', $company_id)->orderBy('id', 'desc')->get(['sender_id', 'id_in_category', 'type', 'recipient_company_id', 'status']);
        $sended_documents_info = [];

        foreach ($submitted_documents_info as $document_info) {
            switch ($document_info['type']) {
                case 'act':
                    $act = Act::find($document_info['id_in_category']);
                    $user_id = $document_info['sender_id'];

                    $recipient_company_name = $this->getCompanyNameAndTin($document_info['recipient_company_id'])['name'];
                    $sended_documents_info[] = [
                        'document_number' => $act->document_number,
                        'document_type' => "Акт",
                        'creator' => $this->getUserNameAndPost($user_id)['name'] . ' ' . $this->getUserNameAndPost($user_id)['surname'] . ', ' . $this->getUserNameAndPost($user_id)['role'],
                        'recipient_company_name' => $recipient_company_name,
                        'recipient_company_id' => $document_info['recipient_company_id'],
                        'status' => $document_info['status']
                    ];

                    break;
            }
        }

        return view('documents.submitted', compact('sended_documents_info'));
    }

    public function store(DocumentRequest $request)
    {
        $data = $request->validated();
        $this->service->createDocument($data);
        return redirect()->route('index');
    }
}
