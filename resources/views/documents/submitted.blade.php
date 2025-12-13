@extends('layouts.documents')

@section('title')
    Документы: новое
@endsection

@section('new')
    active
@endsection

@section('content')
    @if (!empty($sended_documents_info))
        <h4>Отправленные документы</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Тип</th>
                    <th>№</th>
                    <th>Отправитель</th>
                    <th>Компания-получатель</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sended_documents_info as $sended_document_info)
                    <tr>
                        <td>
                            {{ $sended_document_info['document_type'] }}
                        </td>
                        <td>
                            {{ $sended_document_info['document_number'] }}
                        </td>
                        <td>
                            {{ $sended_document_info['creator'] }}
                        </td>
                        <td>
                            @if ($sended_document_info['recipient_company_id'] != Auth::company_id())
                                {{ $sended_document_info['recipient_company_name'] }}
                            @else
                                ВНУТРЕННИЙ ДОКУМЕНТ
                            @endif
                        </td>
                        <td>
                            {{ $sended_document_info['status'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center text-secondary">
            <span class="material-symbols-outlined" style="font-size: 500%">
                folder_off
            </span>
            <h2>Отправленных документов нет</h2>
        </div>
    @endif
@endsection
