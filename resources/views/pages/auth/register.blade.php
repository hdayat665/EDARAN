@extends('layouts.login')

@section('content')
    <div class="container" id="register">
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
                <div class="card card-signup p-5">
                    <h2 class="card-title text-center">Register</h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mr-auto">
                                <div class="social text-center">
                                    <h4 class="mt-3"> or be classical </h4>
                                </div>
                                <form class="form" id="submitForm">
                                    <div class="form-group has-default">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">face</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="first_name" placeholder="First Name..." required>
                                        </div>
                                    </div>
                                    <div class="form-group has-default">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">face</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name..." required>
                                        </div>
                                    </div>
                                    <div class="form-group has-default">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">mail</i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" placeholder="Email..." required>
                                        </div>
                                    </div>
                                    <div class="form-group has-default">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">domain</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="domain" placeholder="Domain Name..." required>
                                        </div>
                                    </div>
                                    <div class="form-group has-default">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">store</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="company" placeholder="Company Name..." required>
                                        </div>
                                    </div>
                                    <div class="form-group has-default">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">phone</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone Number..." required>
                                        </div>
                                    </div>
                                    <div class="form-group has-default">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            <input type="password" name="password" placeholder="Password..." class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group has-default">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            <input type="password" placeholder="Confirm Password..." name="confirm_password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group has-default" id="location">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">flag</i>
                                                </span>
                                            </div>
                                          <div class="col-md-5 pl-0">
                                            <select class="selectpicker" name="location" data-style="select-with-transition" multiple title="Choose Country" data-size="70" required>
                                                <option disabled>Please Select Location...</option>
                                                <?php foreach ($countrys as $country) {?>
                                                    <option value="{{$country}}">{{$country}}</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="allocated_malaysia" type="checkbox" id="checked" value="" >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            Your data will be allocated in Malaysia
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="terms" type="checkbox" value="" required>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            I agree to terms of service & privacy policy
                                            <a href="#something">Terms of service</a>.
                                            <a href="#something">Privacy Policy</a>.
                                        </label>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <span id="submit" class="btn btn-primary btn-round mt-4">Register</s>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

