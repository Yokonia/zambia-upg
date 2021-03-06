@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div id="wrapper"></div>
            </div>
        </div>

        </nav>
        <!-- /. NAV TOP  -->
        @include('includes.client')

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>My Transactions</h2>
                        <h5>View your past transactions for the past 30 days.</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="table_id" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Item Name</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Payment Type</th>
                                            <th>Merchant id</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transactions as $transaction)
                                            <tr class="gradeA">
                                                <td>{{$transaction->id}}</td>
                                                <td>{{$transaction->item}}</td>
                                                <td>{{$transaction->amount}}</td>
                                                <td>{{$transaction->date}}</td>
                                                <td>{{$transaction->payment_type}}</td>
                                                <td>{{$transaction->merchantID}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
