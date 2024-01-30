@extends('layouts.frontend.app')
@section('content')
    <!--================Profile Area =================-->
    <section class="section_gap">
        <div class="container">
            <div class="profile_sections">
                <div class="row">
                    <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <h3>Wallet</h3>
                            <p>{{__('Cards & Wallets')}}</p>
                            @foreach ($paymentCards as $card)
                                <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">
                                    <img src="{{asset('theme/img/credit_card.png')}}" width="50rem" alt="">
                                    Garanti Credi Card.
                                    Card ending in ****{{ substr($card['card_number'], -4) }}
                                </a>
                            @endforeach
                            <a class="list-group-item list-group-item-action" id="list-home-list" href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                <img src="{{asset('theme/img/credit_card.png')}}" width="50rem" alt="">
                                {{__('Add a payment method +')}}
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="row modal-body">
                                        <div class="col-lg-12">
                                            <div class="col-md-12">
                                                <div class="col-md-4 form-group">
                                                    <label for="name">{{__('Card Number')}}</label>
                                                    <input type="text" class="form-control" id="name" ng-model="formData.card_number" placeholder="{{__('Card Number')}}">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="name">{{__('Name On Card')}}</label>
                                                    <input type="text" class="form-control" id="name" ng-model="formData.card_holder_name" placeholder="{{__('Name')}}">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="name">{{__('Expiration Date')}}</label>
                                                    <input type="date" class="form-control" id="name" ng-model="formData.card_expiration_date" placeholder="Name">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="name">{{__('Security Code')}}</label>
                                                    <input type="text" class="form-control" id="name" ng-model="formData.card_cvv" placeholder="CVV">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" ng-click="postData('payments/store' , { formData : formData ,type: 'userPayment'})">{{__('Add your card')}}</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                <img src="{{asset('theme/img/credit_card.png')}}" height="120rem" width="120rem" alt="">
                                Garanti Credi Card.
                                Card ending in ****{{ substr($card['card_number'], -4) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        
    </script>
@endsection