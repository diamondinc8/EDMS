@extends('layouts.documents')

@section('title')
    Документы: новое
@endsection

@section('new')
    active
@endsection

@section('content')
    @if (!empty($received_documents_info))
        <h4>Полученные документы</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Тип</th>
                    <th>№</th>
                    <th>Отправитель</th>
                    <th>Компания-отправитель</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($received_documents_info as $received_document_info)
                    <tr>
                        <td>
                            {{ $received_document_info['document_type'] }}
                        </td>
                        <td>
                            {{ $received_document_info['document_number'] }}
                        </td>
                        <td>
                            {{ $received_document_info['creator'] }}
                        </td>
                        <td>
                            @if ($received_document_info['sender_company_id'] != Auth::company_id())
                                {{ $received_document_info['sender_company_name'] }}
                            @else
                                ВНУТРЕННИЙ ДОКУМЕНТ
                            @endif
                        </td>
                        <td>
                            {{ $received_document_info['status'] }}
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
            <h2>Полученных документов нет</h2>
        </div>
    @endif
@endsection
