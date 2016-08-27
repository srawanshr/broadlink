@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Cart')

@section('body')
    @include('frontend.partials.banner', ['title' => 'Cart' ])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-container-center uk-block-default bl-margin-top-ve bl-padding-2-tb">
            <div class="uk-grid uk-grid-match">
                <div class="uk-width-medium-1-2 uk-push-1-2">
                    {{ Form::open(['route' => 'cart::checkout', 'method' => 'POST', 'class' => 'uk-form', 'id' => 'payment']) }}
                        <div class="uk-grid payment-options">
                            <div class="uk-width-1-2">
                                <label>
                                    <div>
                                        <img src="{{ asset('assets/frontend/img/esewa.png') }}">
                                    </div>
                                    <h3>Esewa</h3>
                                    <input type="radio" value="esewa" name="method" required>
                                </label>
                            </div>
                            <div class="uk-width-1-2">
                                <label>
                                    <div>
                                        <img src="{{ asset('assets/frontend/img/nibl.png') }}">
                                    </div>
                                    <h3>NIBL</h3>
                                    <input type="radio" value="nibl" name="method">
                                </label>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-width-1-3 uk-push-1-3">
                                <button type="button" class="uk-button uk-button-success uk-width-1-1 bl-checkout">
                                    <i class="material-icons">&#xE86C;</i>
                                    Proceed
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="uk-width-medium-1-2 uk-pull-1-2">
                    <div class="uk-vertical-align">
                        <div class="uk-vertical-align-middle">
                            <p class="uk-text-center">
                                <i class="material-icons md-5">&#xE870;</i>
                            </p>
                            <p>
                                Note : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia obcaecati quaerat impedit, inventore sapiente veniam fugiat aut quis ratione dicta dolor doloremque, quibusdam rem culpa hic incidunt est deserunt sint.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('footer')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.bl-checkout').click(function() {
                UIkit.modal.confirm("This will redirect you to the selected payment gateway. You will be automatically redirected after the payment completes.", function(){
                    $('#payment').submit();
                });
            });
        });
    </script>
@stop
