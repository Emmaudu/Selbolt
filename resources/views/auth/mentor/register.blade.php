@extends('auth.authlayout')
@section('title')
Selbolt | Tasker | Register
@endsection
@section("custom_css")

<link href="{{asset('backend/assets/build/css/intlTelInput.css')}}" rel="stylesheet" type="text/css" />

@stop

@section('content')
<nav id="navbar-main" style="background-color: #C124BB;" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-white" href="#">
        Selbolt
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">
              <span class="nav-link-inner--text text-white">Register as Mentee</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('register-mentor')}}" class="nav-link">
              <span class="nav-link-inner--text text-white">Register as Mentor</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-8 bg-white">
            <div class=" m-h-100">
                <div class="account-pages">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="{{ url('/') }}">
                                                <img src="{{ ('/frontend/assets/images/fulllogo.png') }}" alt=""
                                                    height="auto" /> </a>
                                        </div>

                                            @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                                            @endif

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        <h2 id="text-color">Register Here as Mentor</h2>
                                        <form action="{{route('register.mentor')}}" class="authentication-form" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">First Name</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Name" type="text" name="first_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Last Name</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Last name" type="text" name="last_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Email Address</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Email" type="email" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Phone Number</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="phone"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Phone Number" type="text" name="phone_number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Country</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="country"></i>
                                                        </span>
                                                    </div>
                                                    <select required class="form-control" name="country" id="">
                                                    <option disabled selected>--Select Your Country--</option>
                                                        <option data-countryCode="GB" value="GB" val="44" Selected>UK (+44)</option>
                                                        <option data-countryCode="US" value="US" val="1">USA (+1)</option>
                                                        <option data-countryCode="DZ" value="DZ" val="213">Algeria (+213)</option>
                                                        <option data-countryCode="AD" value="AD" val="376">Andorra (+376)</option>
                                                        <option data-countryCode="AO" value="AO" val="244">Angola (+244)</option>
                                                        <option data-countryCode="AI" value="AI" val="1264">Anguilla (+1264)</option>
                                                        <option data-countryCode="AG" value="AG" val="1268">Antigua &amp; Barbuda (+1268)</option>
                                                        <option data-countryCode="AR" value="AR" val="54">Argentina (+54)</option>
                                                        <option data-countryCode="AM" value="AM" val="374">Armenia (+374)</option>
                                                        <option data-countryCode="AW" value="AW" val="297">Aruba (+297)</option>
                                                        <option data-countryCode="AU" value="AU" val="61">Australia (+61)</option>
                                                        <option data-countryCode="AT" value="AT" val="43">Austria (+43)</option>
                                                        <option data-countryCode="AZ" value="AZ" val="994">Azerbaijan (+994)</option>
                                                        <option data-countryCode="BS" value="BS" val="1242">Bahamas (+1242)</option>
                                                        <option data-countryCode="BH" value="BH" val="973">Bahrain (+973)</option>
                                                        <option data-countryCode="BD" value="BD" val="880">Bangladesh (+880)</option>
                                                        <option data-countryCode="BB" value="BB" val="1246">Barbados (+1246)</option>
                                                        <option data-countryCode="BY" value="BY" val="375">Belarus (+375)</option>
                                                        <option data-countryCode="BE" value="BE" val="32">Belgium (+32)</option>
                                                        <option data-countryCode="BZ" value="BZ" val="501">Belize (+501)</option>
                                                        <option data-countryCode="BJ" value="BJ" val="229">Benin (+229)</option>
                                                        <option data-countryCode="BM" value="BM" val="1441">Bermuda (+1441)</option>
                                                        <option data-countryCode="BT" value="BT" val="975">Bhutan (+975)</option>
                                                        <option data-countryCode="BO" value="BO" val="591">Bolivia (+591)</option>
                                                        <option data-countryCode="BA" value="BA" val="387">Bosnia Herzegovina (+387)</option>
                                                        <option data-countryCode="BW" value="BW" val="267">Botswana (+267)</option>
                                                        <option data-countryCode="BR" value="BR" val="55">Brazil (+55)</option>
                                                        <option data-countryCode="BN" value="BN" val="673">Brunei (+673)</option>
                                                        <option data-countryCode="BG" value="BG" val="359">Bulgaria (+359)</option>
                                                        <option data-countryCode="BF" value="BF" val="226">Burkina Faso (+226)</option>
                                                        <option data-countryCode="BI" value="BI" val="257">Burundi (+257)</option>
                                                        <option data-countryCode="KH" value="KH" val="855">Cambodia (+855)</option>
                                                        <option data-countryCode="CM" value="CM" val="237">Cameroon (+237)</option>
                                                        <option data-countryCode="CA" value="CA" val="1">Canada (+1)</option>
                                                        <option data-countryCode="CV" value="CV" val="238">Cape Verde Islands (+238)</option>
                                                        <option data-countryCode="KY" value="KY" val="1345">Cayman Islands (+1345)</option>
                                                        <option data-countryCode="CF" value="CF" val="236">Central African Republic (+236)</option>
                                                        <option data-countryCode="CL" value="CL" val="56">Chile (+56)</option>
                                                        <option data-countryCode="CN" value="CN" val="86">China (+86)</option>
                                                        <option data-countryCode="CO" value="CO" val="57">Colombia (+57)</option>
                                                        <option data-countryCode="KM" value="KM" val="269">Comoros (+269)</option>
                                                        <option data-countryCode="CG" value="CG" val="242">Congo (+242)</option>
                                                        <option data-countryCode="CK" value="CK" val="682">Cook Islands (+682)</option>
                                                        <option data-countryCode="CR" value="CR" val="506">Costa Rica (+506)</option>
                                                        <option data-countryCode="HR" value="HR" val="385">Croatia (+385)</option>
                                                        <option data-countryCode="CU" value="CU" val="53">Cuba (+53)</option>
                                                        <option data-countryCode="CY" value="CY" val="90392">Cyprus North (+90392)</option>
                                                        <option data-countryCode="CY" value="CY" val="357">Cyprus South (+357)</option>
                                                        <option data-countryCode="CZ" value="CZ" val="42">Czech Republic (+42)</option>
                                                        <option data-countryCode="DK" value="DK" val="45">Denmark (+45)</option>
                                                        <option data-countryCode="DJ" value="DJ" val="253">Djibouti (+253)</option>
                                                        <option data-countryCode="DM" value="DM" val="1809">Dominica (+1809)</option>
                                                        <option data-countryCode="DO" value="DO" val="1809">Dominican Republic (+1809)</option>
                                                        <option data-countryCode="EC" value="EC" val="593">Ecuador (+593)</option>
                                                        <option data-countryCode="EG" value="EG" val="20">Egypt (+20)</option>
                                                        <option data-countryCode="SV" value="SV" val="503">El Salvador (+503)</option>
                                                        <option data-countryCode="GQ" value="GQ" val="240">Equatorial Guinea (+240)</option>
                                                        <option data-countryCode="ER" value="ER" val="291">Eritrea (+291)</option>
                                                        <option data-countryCode="EE" value="EE" val="372">Estonia (+372)</option>
                                                        <option data-countryCode="ET" value="ET" val="251">Ethiopia (+251)</option>
                                                        <option data-countryCode="FK" value="FK" val="500">Falkland Islands (+500)</option>
                                                        <option data-countryCode="FO" value="FO" val="298">Faroe Islands (+298)</option>
                                                        <option data-countryCode="FJ" value="FJ" val="679">Fiji (+679)</option>
                                                        <option data-countryCode="FI" value="FI" val="358">Finland (+358)</option>
                                                        <option data-countryCode="FR" value="FR" val="33">France (+33)</option>
                                                        <option data-countryCode="GF" value="GF" val="594">French Guiana (+594)</option>
                                                        <option data-countryCode="PF" value="PF" val="689">French Polynesia (+689)</option>
                                                        <option data-countryCode="GA" value="GA" val="241">Gabon (+241)</option>
                                                        <option data-countryCode="GM" value="GM" val="220">Gambia (+220)</option>
                                                        <option data-countryCode="GE" value="GE" val="7880">Georgia (+7880)</option>
                                                        <option data-countryCode="DE" value="DE" val="49">Germany (+49)</option>
                                                        <option data-countryCode="GH" value="GH" val="233">Ghana (+233)</option>
                                                        <option data-countryCode="GI" value="GI" val="350">Gibraltar (+350)</option>
                                                        <option data-countryCode="GR" value="GR" val="30">Greece (+30)</option>
                                                        <option data-countryCode="GL" value="GL" val="299">Greenland (+299)</option>
                                                        <option data-countryCode="GD" value="GD" val="1473">Grenada (+1473)</option>
                                                        <option data-countryCode="GP" value="GP" val="590">Guadeloupe (+590)</option>
                                                        <option data-countryCode="GU" value="GU" val="671">Guam (+671)</option>
                                                        <option data-countryCode="GT" value="GT" val="502">Guatemala (+502)</option>
                                                        <option data-countryCode="GN" value="GN" val="224">Guinea (+224)</option>
                                                        <option data-countryCode="GW" value="GW" val="245">Guinea - Bissau (+245)</option>
                                                        <option data-countryCode="GY" value="GY" val="592">Guyana (+592)</option>
                                                        <option data-countryCode="HT" value="HT" val="509">Haiti (+509)</option>
                                                        <option data-countryCode="HN" value="HN" val="504">Honduras (+504)</option>
                                                        <option data-countryCode="HK" value="HK" val="852">Hong Kong (+852)</option>
                                                        <option data-countryCode="HU" value="HU" val="36">Hungary (+36)</option>
                                                        <option data-countryCode="IS" value="IS" val="354">Iceland (+354)</option>
                                                        <option data-countryCode="IN" value="IN" val="91">India (+91)</option>
                                                        <option data-countryCode="ID" value="ID" val="62">Indonesia (+62)</option>
                                                        <option data-countryCode="IR" value="IR" val="98">Iran (+98)</option>
                                                        <option data-countryCode="IQ" value="IQ" val="964">Iraq (+964)</option>
                                                        <option data-countryCode="IE" value="IE" val="353">Ireland (+353)</option>
                                                        <option data-countryCode="IL" value="IL" val="972">Israel (+972)</option>
                                                        <option data-countryCode="IT" value="IT" val="39">Italy (+39)</option>
                                                        <option data-countryCode="JM" value="JM" val="1876">Jamaica (+1876)</option>
                                                        <option data-countryCode="JP" value="JP" val="81">Japan (+81)</option>
                                                        <option data-countryCode="JO" value="JO" val="962">Jordan (+962)</option>
                                                        <option data-countryCode="KZ" value="KZ" val="7">Kazakhstan (+7)</option>
                                                        <option data-countryCode="KE" value="KE" val="254">Kenya (+254)</option>
                                                        <option data-countryCode="KI" value="KI" val="686">Kiribati (+686)</option>
                                                        <option data-countryCode="KP" value="KP" val="850">Korea North (+850)</option>
                                                        <option data-countryCode="KR" value="KR" val="82">Korea South (+82)</option>
                                                        <option data-countryCode="KW" value="KW" val="965">Kuwait (+965)</option>
                                                        <option data-countryCode="KG" value="KG" val="996">Kyrgyzstan (+996)</option>
                                                        <option data-countryCode="LA" value="LA" val="856">Laos (+856)</option>
                                                        <option data-countryCode="LV" value="LV" val="371">Latvia (+371)</option>
                                                        <option data-countryCode="LB" value="LB" val="961">Lebanon (+961)</option>
                                                        <option data-countryCode="LS" value="LS" val="266">Lesotho (+266)</option>
                                                        <option data-countryCode="LR" value="LR" val="231">Liberia (+231)</option>
                                                        <option data-countryCode="LY" value="LY" val="218">Libya (+218)</option>
                                                        <option data-countryCode="LI" value="LI" val="417">Liechtenstein (+417)</option>
                                                        <option data-countryCode="LT" value="LT" val="370">Lithuania (+370)</option>
                                                        <option data-countryCode="LU" value="LU" val="352">Luxembourg (+352)</option>
                                                        <option data-countryCode="MO" value="MO" val="853">Macao (+853)</option>
                                                        <option data-countryCode="MK" value="MK" val="389">Macedonia (+389)</option>
                                                        <option data-countryCode="MG" value="MG" val="261">Madagascar (+261)</option>
                                                        <option data-countryCode="MW" value="MW" val="265">Malawi (+265)</option>
                                                        <option data-countryCode="MY" value="MY" val="60">Malaysia (+60)</option>
                                                        <option data-countryCode="MV" value="MV" val="960">Maldives (+960)</option>
                                                        <option data-countryCode="ML" value="ML" val="223">Mali (+223)</option>
                                                        <option data-countryCode="MT" value="MT" val="356">Malta (+356)</option>
                                                        <option data-countryCode="MH" value="MH" val="692">Marshall Islands (+692)</option>
                                                        <option data-countryCode="MQ" value="MQ" val="596">Martinique (+596)</option>
                                                        <option data-countryCode="MR" value="MR" val="222">Mauritania (+222)</option>
                                                        <option data-countryCode="YT" value="YT" val="269">Mayotte (+269)</option>
                                                        <option data-countryCode="MX" value="MX" val="52">Mexico (+52)</option>
                                                        <option data-countryCode="FM" value="FM" val="691">Micronesia (+691)</option>
                                                        <option data-countryCode="MD" value="MD" val="373">Moldova (+373)</option>
                                                        <option data-countryCode="MC" value="MC" val="377">Monaco (+377)</option>
                                                        <option data-countryCode="MN" value="MN" val="976">Mongolia (+976)</option>
                                                        <option data-countryCode="MS" value="MS" val="1664">Montserrat (+1664)</option>
                                                        <option data-countryCode="MA" value="MA" val="212">Morocco (+212)</option>
                                                        <option data-countryCode="MZ" value="MZ" val="258">Mozambique (+258)</option>
                                                        <option data-countryCode="MN" value="MN" val="95">Myanmar (+95)</option>
                                                        <option data-countryCode="NA" value="NA" val="264">Namibia (+264)</option>
                                                        <option data-countryCode="NR" value="NR" val="674">Nauru (+674)</option>
                                                        <option data-countryCode="NP" value="NP" val="977">Nepal (+977)</option>
                                                        <option data-countryCode="NL" value="NL" val="31">Netherlands (+31)</option>
                                                        <option data-countryCode="NC" value="NC" val="687">New Caledonia (+687)</option>
                                                        <option data-countryCode="NZ" value="NZ" val="64">New Zealand (+64)</option>
                                                        <option data-countryCode="NI" value="NI" val="505">Nicaragua (+505)</option>
                                                        <option data-countryCode="NE" value="NE" val="227">Niger (+227)</option>
                                                        <option data-countryCode="NG" value="NG" val="234">Nigeria (+234)</option>
                                                        <option data-countryCode="NU" value="NU" val="683">Niue (+683)</option>
                                                        <option data-countryCode="NF" value="NF" val="672">Norfolk Islands (+672)</option>
                                                        <option data-countryCode="NP" value="NP" val="670">Northern Marianas (+670)</option>
                                                        <option data-countryCode="NO" value="NO" val="47">Norway (+47)</option>
                                                        <option data-countryCode="OM" value="OM" val="968">Oman (+968)</option>
                                                        <option data-countryCode="PW" value="PW" val="680">Palau (+680)</option>
                                                        <option data-countryCode="PA" value="PA" val="507">Panama (+507)</option>
                                                        <option data-countryCode="PG" value="PG" val="675">Papua New Guinea (+675)</option>
                                                        <option data-countryCode="PY" value="PY" val="595">Paraguay (+595)</option>
                                                        <option data-countryCode="PE" value="PE" val="51">Peru (+51)</option>
                                                        <option data-countryCode="PH" value="PH" val="63">Philippines (+63)</option>
                                                        <option data-countryCode="PL" value="PL" val="48">Poland (+48)</option>
                                                        <option data-countryCode="PT" value="PT" val="351">Portugal (+351)</option>
                                                        <option data-countryCode="PR" value="PR" val="1787">Puerto Rico (+1787)</option>
                                                        <option data-countryCode="QA" value="QA" val="974">Qatar (+974)</option>
                                                        <option data-countryCode="RE" value="RE" val="262">Reunion (+262)</option>
                                                        <option data-countryCode="RO" value="RO" val="40">Romania (+40)</option>
                                                        <option data-countryCode="RU" value="RU" val="7">Russia (+7)</option>
                                                        <option data-countryCode="RW" value="RW" val="250">Rwanda (+250)</option>
                                                        <option data-countryCode="SM" value="SM" val="378">San Marino (+378)</option>
                                                        <option data-countryCode="ST" value="ST" val="239">Sao Tome &amp; Principe (+239)</option>
                                                        <option data-countryCode="SA" value="SA" val="966">Saudi Arabia (+966)</option>
                                                        <option data-countryCode="SN" value="SN" val="221">Senegal (+221)</option>
                                                        <option data-countryCode="CS" value="CS" val="381">Serbia (+381)</option>
                                                        <option data-countryCode="SC" value="SC" val="248">Seychelles (+248)</option>
                                                        <option data-countryCode="SL" value="SL" val="232">Sierra Leone (+232)</option>
                                                        <option data-countryCode="SG" value="SG" val="65">Singapore (+65)</option>
                                                        <option data-countryCode="SK" value="SK" val="421">Slovak Republic (+421)</option>
                                                        <option data-countryCode="SI" value="SI" val="386">Slovenia (+386)</option>
                                                        <option data-countryCode="SB" value="SB" val="677">Solomon Islands (+677)</option>
                                                        <option data-countryCode="SO" value="SO" val="252">Somalia (+252)</option>
                                                        <option data-countryCode="ZA" value="ZA" val="27">South Africa (+27)</option>
                                                        <option data-countryCode="ES" value="ES" val="34">Spain (+34)</option>
                                                        <option data-countryCode="LK" value="LK" val="94">Sri Lanka (+94)</option>
                                                        <option data-countryCode="SH" value="SH" val="290">St. Helena (+290)</option>
                                                        <option data-countryCode="KN" value="KN" val="1869">St. Kitts (+1869)</option>
                                                        <option data-countryCode="SC" value="SC" val="1758">St. Lucia (+1758)</option>
                                                        <option data-countryCode="SD" value="SD" val="249">Sudan (+249)</option>
                                                        <option data-countryCode="SR" value="SR" val="597">Suriname (+597)</option>
                                                        <option data-countryCode="SZ" value="SZ" val="268">Swaziland (+268)</option>
                                                        <option data-countryCode="SE" value="SE" val="46">Sweden (+46)</option>
                                                        <option data-countryCode="CH" value="CH" val="41">Switzerland (+41)</option>
                                                        <option data-countryCode="SI" value="SI" val="963">Syria (+963)</option>
                                                        <option data-countryCode="TW" value="TW" val="886">Taiwan (+886)</option>
                                                        <option data-countryCode="TJ" value="TJ" val="7">Tajikstan (+7)</option>
                                                        <option data-countryCode="TH" value="TH" val="66">Thailand (+66)</option>
                                                        <option data-countryCode="TG" value="TG" val="228">Togo (+228)</option>
                                                        <option data-countryCode="TO" value="TO" val="676">Tonga (+676)</option>
                                                        <option data-countryCode="TT" value="TT" val="1868">Trinidad &amp; Tobago (+1868)</option>
                                                        <option data-countryCode="TN" value="TN" val="216">Tunisia (+216)</option>
                                                        <option data-countryCode="TR" value="TR" val="90">Turkey (+90)</option>
                                                        <option data-countryCode="TM" value="TM" val="7">Turkmenistan (+7)</option>
                                                        <option data-countryCode="TM" value="TM" val="993">Turkmenistan (+993)</option>
                                                        <option data-countryCode="TC" value="TC" val="1649">Turks &amp; Caicos Islands (+1649)</option>
                                                        <option data-countryCode="TV" value="TV" val="688">Tuvalu (+688)</option>
                                                        <option data-countryCode="UG" value="UG" val="256">Uganda (+256)</option>
                                                        <!-- <option data-countryCode="GB" value="GB" val="44">UK (+44)</option> -->
                                                        <option data-countryCode="UA" value="UA" val="380">Ukraine (+380)</option>
                                                        <option data-countryCode="AE" value="AE" val="971">United Arab Emirates (+971)</option>
                                                        <option data-countryCode="UY" value="UY" val="598">Uruguay (+598)</option>
                                                        <!-- <option data-countryCode="US" value="US" val="1">USA (+1)</option> -->
                                                        <option data-countryCode="UZ" value="UZ" val="7">Uzbekistan (+7)</option>
                                                        <option data-countryCode="VU" value="VU" val="678">Vanuatu (+678)</option>
                                                        <option data-countryCode="VA" value="VA" val="379">Vatican City (+379)</option>
                                                        <option data-countryCode="VE" value="VE" val="58">Venezuela (+58)</option>
                                                        <option data-countryCode="VN" value="VN" val="84">Vietnam (+84)</option>
                                                        <option data-countryCode="VG" value="VG" val="84">Virgin Islands - British (+1284)</option>
                                                        <option data-countryCode="VI" value="VI" val="84">Virgin Islands - US (+1340)</option>
                                                        <option data-countryCode="WF" value="WF" val="681">Wallis &amp; Futuna (+681)</option>
                                                        <option data-countryCode="YE" value="YE" val="969">Yemen (North)(+969)</option>
                                                        <option data-countryCode="YE" value="YE" val="967">Yemen (South)(+967)</option>
                                                        <option data-countryCode="ZM" value="ZM" val="260">Zambia (+260)</option>
                                                        <option data-countryCode="ZW" value="ZW" val="263">Zimbabwe (+263)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Password" type="password" name="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Confirm Password</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="confirm password" type="password" name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Select Category</label>
                                                <div class="input-group input-group-merge">
                                                    <select id="inputState" class="form-control" name="category">
                                                        <option selected disabled>Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Company Name</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="octagon"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="company" type="text" name="company_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Job Title</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="octagon"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="Job Title" type="text" name="job_title">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Account Number</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="octagon"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="Account Number" type="number" name="account_number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Phone Number</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="phone"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="Phone Number" type="number" name="mobile">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Twitter handle</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="twitter"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="Twitter" type="text" name="social[]">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">LinkedIn handle</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="linkedin"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="Linkedin" type="text" name="social[]">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Facebook handle</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="facebook"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="facebook" type="text" name="social[]">
                                                </div>
                                            </div>
                                            <!-- MENTORSHIP QUESTION -->
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Tag</label>
                                                <br><small style="margin-bottom: 10px;">Comma-separated list of your skills (keep it below 10). Mentees will use this to find you.</small>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="e.g graphics design, photoshop" type="text" name="tag">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Price</label>
                                               <br> <small>We are encouraging you to set the price to 0.00 if you want to mentor for free. Remember that there is a 20% processing fee per transaction. Limit is NGN 10000/week</small>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="octagon"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control" placeholder="weekly price" type="text" name="price">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Highest Educational Level</label>
                                                <div class="input-group input-group-merge">
                                                    <select id="inputState" class="form-control" name="level">
                                                        <option selected disabled>Highest Educational Level</option>
                                                        <option>None/Other</option>
                                                        <option>Dropout</option>
                                                        <option>Bachelor</option>
                                                        <option>Master</option>
                                                        <option>Phd</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--INTERVIEWER QUESTION -->

                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Bio</label>
                                                <div class="input-group input-group-merge">
                                                    <textarea class="form-control" name="bio" rows="8"></textarea>
                                                </div>
                                            </div>
                                            <h2 id="text-color">Interviews Questions</h2>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label"><small>INTERVIEW: Why do you want to become a mentor? (Not publicly visible):</small></label>
                                                <div class="input-group input-group-merge">
                                                    <textarea class="form-control" name="why_a_mentor" rows="8"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label"><small>INTERVIEW: What is your greatest career success so far? (Not publicly visible):</small></label>
                                                <div class="input-group input-group-merge">
                                                    <textarea class="form-control" name="career_success" rows="8"></textarea>
                                                </div>
                                            </div>
                                                @foreach($services as $service)
                                                    @if($service->status == "general")
                                                    <div class="form-group">
                                                        <label id="text-color" class="form-control-label">{{$service->name}}</label>
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-dual" data-feather="phone"></i>
                                                                </span>
                                                            </div>
                                                            <input required class="form-control" type="text" name="services[]">
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="form-group">
                                                        <label id="text-color" class="label">{{$service->name}}</label>
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-dual" data-feather="phone"></i>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" type="text" name="services[]">
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-block" style="background-color: #C124BB;" type="submit"> Sign up
                                                </button>
                                            </div>
                                        </form>
                                        <div class="py-3 text-center"><span
                                                class="font-size-16 font-weight-bold">Or</span></div>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{route('register-mentee')}}" class="btn btn-white"><small>Signup as a mentee</small></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 d-none d-md-block bg-cover"
                                        style="background-image: url(/backend/assets/images/login.svg);">

                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Login <a href="{{route('login-mentor')}}"
                                        class="text-primary font-weight-bold ml-1">here</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                    <!-- end row -->
                    <!-- end container -->
                </div>
                <!-- end page -->
            
                <div class="col-lg-4 d-none d-md-block bg-cover"
                    style="background-image: url(/backend/assets/images/login.svg);">

                </div>
    </div>
</div>

@endsection


@section("javascript")
<script src="{{asset('backend/assets/build/js/intlTelInput.js')}}"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // any initialisation options go here
    });
</script>


@stop
