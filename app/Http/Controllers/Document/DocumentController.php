<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use Illuminate\Http\Request;

class DocumentController extends BaseController
{
    public function index()
    {
        return view('documents.index');
    }

    public function store(DocumentRequest $request)
    {
        $data = $request->validated();
        $this->service->createDocument($data);
    }
}
