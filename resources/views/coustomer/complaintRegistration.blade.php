@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-12 col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Complaint Registration') }}</div>

                    <div class="card-body">
                        @include('component.alert')
                        <form method="POST" action="{{ route('complaintRegistrationSave') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class=" container">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="row">

                                        {{-- Ticket ID --}}
                                        <div class="col-md-12 col-lg-12">
                                            <div class="mb-3">
                                                <label for="ticketID" class="form-label">Ticket ID</label>
                                                <input type="text" class="form-control" id="ticketID"
                                                    aria-describedby="ticketIDHelp" name="ticketID"
                                                    value="{{ $ticketID}}" readonly>
                                            </div>
                                        </div>

                                        {{-- Status --}}
                                        <div class="col-md-12 col-lg-12">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <input type="text" class="form-control" id="status"
                                                    aria-describedby="statusHelp" name="status"
                                                    value="In Processing" readonly>
                                            </div>
                                        </div>

                                        {{-- Name --}}
                                        <div class="col-md-6 col-lg-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Coustomer Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="nameHelp" name="name"
                                                    value="{{ Auth::user()->name }}" readonly>
                                            </div>
                                        </div>

                                        {{-- Coustomer Email --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Coustomer Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    aria-describedby="emailHelp" name="email"
                                                    value="{{ Auth::user()->email }}" readonly>
                                            </div>
                                        </div>

                                        {{-- Coustomer Phone --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Coustomer Phone</label>
                                                <input type="tel"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    aria-describedby="phoneHelp" name="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback form-text" id="phoneHelp" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Product Number --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="productPartNo" class="form-label">Product Number</label>
                                                <input type="text"
                                                    class="form-control @error('productPartNo') is-invalid @enderror"
                                                    id="productPartNo" aria-describedby="productPartNoHelp"
                                                    name="productPartNo">
                                                @error('productPartNo')
                                                    <span class="invalid-feedback form-text" id="productPartNoHelp"
                                                        role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Product Serial Number --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="productSerialNo" class="form-label">Product Serial
                                                    Number</label>
                                                <input type="text"
                                                    class="form-control @error('productSerialNo') is-invalid @enderror"
                                                    id="productSerialNo" aria-describedby="productSerialNoHelp"
                                                    name="productSerialNo">
                                                @error('productSerialNo')
                                                    <span class="invalid-feedback form-text" id="phoneHelp" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Product DOP --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="purchaseDate" class="form-label">Purchase Date</label>
                                                <input type="date"
                                                    class="form-control @error('purchaseDate') is-invalid @enderror"
                                                    id="purchaseDate" aria-describedby="purchaseDateHelp"
                                                    name="purchaseDate">
                                                @error('purchaseDate')
                                                    <span class="invalid-feedback form-text" id="phoneHelp" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Product Warranty Check --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="warrantyCheck" class="form-label">Warranty Check</label>
                                                <select class="form-control @error('warrantyCheck') is-invalid @enderror"
                                                    id="warrantyCheck" aria-describedby="warrantyCheckHelp"
                                                    name="warrantyCheck">
                                                    {{-- @if (!$user->gender) --}}
                                                    <option value="">------</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                    @error('warrantyCheck')
                                                        <span class="invalid-feedback form-text" id="phoneHelp" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    {{-- @else --}}
                                                    {{-- @endif --}}
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Product Chanal Of Purchase --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="chanalPurchase" class="form-label">Chanal Of Purchase</label>
                                                <select class="form-control @error('chanalPurchase') is-invalid @enderror"
                                                    id="chanalPurchase" aria-describedby="chanalPurchaseHelp"
                                                    name="chanalPurchase">
                                                    {{-- @if (!$user->gender) --}}
                                                    <option value="">------</option>
                                                    <option value="Online">Online</option>
                                                    <option value="Offline">Offline</option>
                                                    {{-- @else --}}
                                                    {{-- @endif --}}
                                                    @error('chanalPurchase')
                                                        <span class="invalid-feedback form-text" id="phoneHelp"
                                                            role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>

                                        {{-- City --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    id="city" aria-describedby="cityHelp" name="city">
                                                @error('city')
                                                    <span class="invalid-feedback form-text" id="phoneHelp" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- state --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">State</label>
                                                <input type="text"
                                                    class="form-control @error('state') is-invalid @enderror"
                                                    id="state" aria-describedby="stateHelp" name="state">
                                                @error('state')
                                                    <span class="invalid-feedback form-text" id="phoneHelp" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Pincode --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="pinCode" class="form-label">Pincode</label>
                                                <input type="text"
                                                    class="form-control @error('pinCode') is-invalid @enderror"
                                                    id="pinCode" aria-describedby="pinCodeHelp" name="pinCode">
                                                @error('pinCode')
                                                    <span class="invalid-feedback form-text" id="phoneHelp" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Purchase Invoice --}}
                                        <div class="col-md-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="purchaseInvoice" class="form-label">Purchase Invoice</label>
                                                <input type="file"
                                                    class="form-control @error('purchaseInvoice') is-invalid @enderror"
                                                    id="purchaseInvoice" aria-describedby="purchaseInvoiceHelp"
                                                    name="purchaseInvoice">
                                                @error('purchaseInvoice')
                                                    <span class="invalid-feedback form-text" id="purchaseInvoiceHelp"
                                                        role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Describe your Issue --}}
                                        <div class="col-md-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="issue" class="form-label">Describe your Issue</label>
                                                <textarea type="text" class="form-control @error('issue') is-invalid @enderror" id="issue"
                                                    aria-describedby="issueHelp" name="issue"></textarea>
                                                @error('issue')
                                                    <span class="invalid-feedback form-text" id="purchaseInvoiceHelp"
                                                        role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
