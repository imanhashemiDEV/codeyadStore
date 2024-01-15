@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="card">
                    <div class="row">
                        <div class="col-4 text-success">
                            کل واریزی : {{$deposit}}تومان
                        </div>
                        <div class="col-4 text-danger">
                             کل برداشت :  {{$withdraw}}تومان
                        </div>
                        <div class="col-4 text-info">
                            موجودی :  {{$total_amount}}تومان
                        </div>
                    </div>
                </div>
                <div class="table overflow-auto" tabindex="8">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary">ردیف</th>
                            <th class="text-center align-middle text-primary">مبلغ</th>
                            <th class="text-center align-middle text-primary">نوع تراکنش</th>
                            <th class="text-center align-middle text-primary">توضیحات</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $index=> $transaction)
                            <tr>
                                <td class="text-center align-middle">{{$transactions->firstItem()+$index}}</td>
                                <td class="text-center align-middle">{{$transaction->amount}}</td>
                                <td class="text-center align-middle">
                                    @if($transaction->type==\App\Enums\UserTransactionType::Deposit->value)
                                        <span class="cursor-pointer badge badge-success">واریز</span>
                                    @elseif($transaction->type==\App\Enums\UserTransactionType::Withdraw->value)
                                        <span class="cursor-pointer badge badge-danger">برداشت</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">{{$transaction->description}}</td>
                                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($transaction->created_at)->format('%B %d، %Y')}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div style="margin: 40px !important;"
                         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                        {{$transactions->appends(Request::except('page'))->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
