@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        You are Admin.<br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">S.NO</th>
                                    <th scope="col">Ticket ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    {{-- <th scope="col">Product Serial No</th> --}}
                                    {{-- <th scope="col">Product Part No</th> --}}
                                    {{-- <th scope="col">Purchase Date</th> --}}
                                    {{-- <th scope="col">Warranty Check</th> --}}
                                    {{-- <th scope="col">Chanal Purchase</th> --}}
                                    {{-- <th scope="col">City</th> --}}
                                    {{-- <th scope="col">State</th> --}}
                                    {{-- <th scope="col">PinCode</th> --}}
                                    <th scope="col">Issue</th>
                                    <th scope="col">Purchase Invoice</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getdata as $cdata)
                                    <tr>
                                        <th scope="row">{{ $cdata->id }}</th>
                                        <td><a href="" target="_blank">{{ $cdata->ticketID }}</a></td>
                                        <td>{{ $cdata->name }}</td>
                                        <td>{{ $cdata->email }}</td>
                                        <td>{{ $cdata->phone }}</td>
                                        {{-- <td>{{ $cdata->productSerialNo}}</td> --}}
                                        {{-- <td>{{ $cdata->productPartNo}}</td> --}}
                                        {{-- <td>{{ $cdata->purchaseDate}}</td> --}}
                                        {{-- <td>{{ $cdata->warrantyCheck}}</td> --}}
                                        {{-- <td>{{ $cdata->chanalPurchase}}</td> --}}
                                        {{-- <td>{{ $cdata->city}}</td> --}}
                                        {{-- <td>{{ $cdata->state}}</td> --}}
                                        {{-- <td>{{ $cdata->pinCode}}</td> --}}
                                        <td class="col">{{ $cdata->issue }}</td>
                                        {{-- <td>{{ $cdata->purchaseInvoice }}</td> --}}
                                        <td>
                                            @if ($cdata->purchaseInvoice != '')
                                                <div class=" text-center"><a class="text-decoration-none text-center"
                                                        href="{{ '/Complaint-Registration/' . $cdata->purchaseInvoice }}"
                                                        target="_blank" download="{!! $cdata->purchaseInvoice !!}"><i
                                                            class="fa fa-cloud-download fa-2x" aria-hidden="true"></i></a>
                                                </div>
                                            @else
                                                <div class="">N/A</div>
                                            @endif
                                        </td>
                                        <td>{{ $cdata->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
