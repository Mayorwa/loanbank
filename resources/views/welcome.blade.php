@extends('containers._default')
@section('content')
    <div class="login">
        <div class="login__row">
            <div class="login__col login-side">
                <img src="{{ asset('img/logo/logo_flag_navy.svg') }}" class="login-side__logo" alt="">
            </div>
            <div class="login__col login__signin-img">
                <div class="login__calc">
                    <p>Your Monthly Payment</p>
                    <h3><sup>₦</sup>{{isset($payment) ? $payment['monthlyAmount'] : ' 0.00'}}</h3>
                    <div class="login__calc-breakdown">
                        <div>
                            <p>Principal</p>
                            <p>{{isset($payment) ? $payment['principal'] : ' 0.00'}}</p>
                        </div>
                        <div>
                            <p>total amount paid</p>
                            <p>₦ {{isset($payment) ? $payment['totalAmountInNaira'] : ' 0.00'}}</p>
                        </div>
                        <div>
                            <p>total interest paid</p>
                            <p>₦ {{isset($payment) ? $payment['interestInNaira'] : ' 0.00'}}</p>
                        </div>
                        <div>
                            <p>number of months</p>
                            <p>{{isset($payment) ? $payment['months'] : ' 0.00'}} months</p>
                        </div>
                        <div>
                            <p>interest rate per year</p>
                            <p>{{isset($payment) ? $payment['interestInPer'] : ' 0.00'}} %</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login__col login-form">
                <div class="login__form-div">
                    <form class="login__form" action="{{ URL('/') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="login__logo"><img src="{{ asset('img/logo/logo_hero_navy.svg') }}" alt=""></a>
                        <div class="login__stage h5">Calculate your Loan</div>
                        <div class="login__field">
                            <div class="field__label">Amount (₦)
                                <span title="amount to be paid">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" class="icon icon-link">
                                        <use xlink:href="/sprite.svg#icon-info"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="field__wrap">
                                <input class="field__input" name="amount" type="text" placeholder="e.g ₦10, 000.00" pattern="^\₦\d{1,3}(,\d{3})*(\.\d+)?₦" data-type="currency" required>
                            </div>
                        </div>
                        <div class="login__field">
                            <div class="field__label">Loan Term in Months
                                <span title="number of months to repay the loan">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" class="icon icon-link">
                                        <use xlink:href="/sprite.svg#icon-info"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="field__wrap">
                                <input class="field__input" name="months" step="any" type="number" placeholder="e.g 3 months" min="1" data-type="month" required>
                            </div>
                        </div>
                        <div class="login__field">
                            <div class="field__label">Interest Rate per year
                                <span title="at what rate will the loan be paid">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" class="icon icon-link">
                                        <use xlink:href="/sprite.svg#icon-info"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="field__wrap">
                                <input class="field__input" name="interest" type="number" step="any" placeholder="e.g 2.55 %" data-type="interest" required>
                            </div>
                        </div>

                        <button type="submit" class="login__btn button button--blue-white button_wide">
                            <span>Calculate Loan</span>
                            <span>
                                <svg width="20px" height="20px" class="icon icon-link">
                                    <use xlink:href="/sprite.svg#icon-arrow-right"></use>
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
