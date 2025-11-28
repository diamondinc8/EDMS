<?php

namespace App\Services\Document;

use App\Models\Act;
use App\Models\Company;
use App\Models\Order;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

/*
array:6 [▼ // app\Http\Controllers\Document\DocumentController.php:19
  "document_type" => "order"
  "document_number" => "1"
  "title" => "23"
  "date" => "0322-03-13"
  "content" => "12333"
  "documents" => array:4 [▼
    0 => "Счёт на оплату №324 17.10.2025.xlsx"
    1 => "Накладная №324 17.10.2025.xlsx"
    2 => "Накладная №323 14.10.2025.xlsx"
    3 => "Счёт на оплату №323 14.10.2025.xlsx"
  ]
]
*/

class Service
{
  public function createDocument($data)
  {
    $dataForSave = [];
    $type = $data['document_type'];
    $data['company_sender_id'] = Auth::company_id();
    $data['user_sender_id'] = Auth::id();

    // НЕ ЗАБЫТЬ РЕАЛИЗОВАТЬ ЗАГРУЗКУ ДОКУМЕНТОВ НА СЕРВЕР!!!!
    $dataForSave['title'] = $data['title'];
    $dataForSave['type'] = $type;
    $dataForSave['sender_id'] = $data['user_sender_id'];
    $dataForSave['company_sender_id'] = $data['company_sender_id'];
    $dataForSave['recipient_company_id'] = $data['recipient_company_id'];

    unset($data['document_type'], $data['documents']);
    switch ($type) {
      case "order":
        Order::create($data);
        break;
      case "act":

        $act = Act::create($data);
        $dataForSave['id_in_category'] = $act->id;
        Document::create($dataForSave);
        break;
    }
  }
}
