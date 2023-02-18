<div class="tab-pane fade" id="default-tab-2">
    <h3 class="mt-10px"></i> Permanent Address</h3>
    <br>
    <form id="addressForm">
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Address 1*</label>
            <div class="col-md-5">
                <input type="text" name="address1" id="address1" class="form-control mb-10px" placeholder="ADDRESS 1" />
                <input type="hidden" name="user_id" id="user_id" class="form-control mb-10px" />

            </div><label class="form-label col-form-label col-md-1">Address 2</label>
            <div class="col-md-5">
                <input type="text" name="address2" id="address2" class="form-control mb-5px" placeholder="ADDRESS 2"/>

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Postcode*</label>
            <div class="col-md-5">
                <input type="text" name="postcode" id="postcode" class="form-control mb-10px" placeholder="00000"  />

            </div><label class="form-label col-form-label col-md-1">City*</label>
            <div class="col-md-5">
                <input type="text" name="city" id="city" class="form-control mb-5px" placeholder="CITY" />

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">State*</label>
            <div class="col-md-5">
                <select class="form-select" name="state" id="state">
                    <option label="PLEASE CHOOSE" selected="selected"></option>
                    <option value="JOHOR" label="JOHOR">JOHOR</option>
                    <option value="KEDAH" label="KEDAH">Kedah</option>
                    <option value="Kelantan" label="Kelantan">Kelantan</option>
                    <option value="Negeri Sembilan" label="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang" label="Pahang">Pahang</option>
                    <option value="Penang" label="Penang">Penang</option>
                    <option value="Perak" label="Perak">Perak</option>
                    <option value="Perlis" label="Perlis">Perlis</option>
                    <option value="Sabah" label="Sabah">Sabah</option>
                    <option value="Sarawak" label="Sarawak">Sarawak</option>
                    <option value="Selangor" label="Selangor">Selangor</option>
                    <option value="Terengganu" label="Terengganu">Terengganu</option>
                    <option value="Kuala Lumpur" label="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Labuan" label="Labuan">Labuan</option>
                    <option value="Putrajaya" label="Putrajaya">Putrajaya</option>
                </select>
            </div>
            <label class="form-label col-form-label col-md-1">Country*</label>
            <div class="col-md-5">
            <select class="form-select" name="country" id="country" >
                    <option label="PLEASE CHOOSE " disabled></option>
                    <optgroup id="country-optgroup-Africa" label="Africa">
                        <option value="DZ" label="Algeria">Algeria</option>
                        <option value="AO" label="Angola">Angola</option>
                        <option value="BJ" label="Benin">Benin</option>
                        <option value="BW" label="Botswana">Botswana</option>
                        <option value="BF" label="Burkina Faso">Burkina Faso</option>
                        <option value="BI" label="Burundi">Burundi</option>
                        <option value="CM" label="Cameroon">Cameroon</option>
                        <option value="CV" label="Cape Verde">Cape Verde</option>
                        <option value="CF" label="Central African Republic">Central African Republic</option>
                        <option value="TD" label="Chad">Chad</option>
                        <option value="KM" label="Comoros">Comoros</option>
                        <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                        <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                        <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                        <option value="DJ" label="Djibouti">Djibouti</option>
                        <option value="EG" label="Egypt">Egypt</option>
                        <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="ER" label="Eritrea">Eritrea</option>
                        <option value="ET" label="Ethiopia">Ethiopia</option>
                        <option value="GA" label="Gabon">Gabon</option>
                        <option value="GM" label="Gambia">Gambia</option>
                        <option value="GH" label="Ghana">Ghana</option>
                        <option value="GN" label="Guinea">Guinea</option>
                        <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="KE" label="Kenya">Kenya</option>
                        <option value="LS" label="Lesotho">Lesotho</option>
                        <option value="LR" label="Liberia">Liberia</option>
                        <option value="LY" label="Libya">Libya</option>
                        <option value="MG" label="Madagascar">Madagascar</option>
                        <option value="MW" label="Malawi">Malawi</option>
                        <option value="ML" label="Mali">Mali</option>
                        <option value="MR" label="Mauritania">Mauritania</option>
                        <option value="MU" label="Mauritius">Mauritius</option>
                        <option value="YT" label="Mayotte">Mayotte</option>
                        <option value="MA" label="Morocco">Morocco</option>
                        <option value="MZ" label="Mozambique">Mozambique</option>
                        <option value="NA" label="Namibia">Namibia</option>
                        <option value="NE" label="Niger">Niger</option>
                        <option value="NG" label="Nigeria">Nigeria</option>
                        <option value="RW" label="Rwanda">Rwanda</option>
                        <option value="RE" label="Réunion">Réunion</option>
                        <option value="SH" label="Saint Helena">Saint Helena</option>
                        <option value="SN" label="Senegal">Senegal</option>
                        <option value="SC" label="Seychelles">Seychelles</option>
                        <option value="SL" label="Sierra Leone">Sierra Leone</option>
                        <option value="SO" label="Somalia">Somalia</option>
                        <option value="ZA" label="South Africa">South Africa</option>
                        <option value="SD" label="Sudan">Sudan</option>
                        <option value="SZ" label="Swaziland">Swaziland</option>
                        <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                        <option value="TZ" label="Tanzania">Tanzania</option>
                        <option value="TG" label="Togo">Togo</option>
                        <option value="TN" label="Tunisia">Tunisia</option>
                        <option value="UG" label="Uganda">Uganda</option>
                        <option value="EH" label="Western Sahara">Western Sahara</option>
                        <option value="ZM" label="Zambia">Zambia</option>
                        <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                    </optgroup>
                    <optgroup id="country-optgroup-Americas" label="Americas">
                        <option value="AI" label="Anguilla">Anguilla</option>
                        <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="AR" label="Argentina">Argentina</option>
                        <option value="AW" label="Aruba">Aruba</option>
                        <option value="BS" label="Bahamas">Bahamas</option>
                        <option value="BB" label="Barbados">Barbados</option>
                        <option value="BZ" label="Belize">Belize</option>
                        <option value="BM" label="Bermuda">Bermuda</option>
                        <option value="BO" label="Bolivia">Bolivia</option>
                        <option value="BR" label="Brazil">Brazil</option>
                        <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
                        <option value="CA" label="Canada">Canada</option>
                        <option value="KY" label="Cayman Islands">Cayman Islands</option>
                        <option value="CL" label="Chile">Chile</option>
                        <option value="CO" label="Colombia">Colombia</option>
                        <option value="CR" label="Costa Rica">Costa Rica</option>
                        <option value="CU" label="Cuba">Cuba</option>
                        <option value="DM" label="Dominica">Dominica</option>
                        <option value="DO" label="Dominican Republic">Dominican Republic</option>
                        <option value="EC" label="Ecuador">Ecuador</option>
                        <option value="SV" label="El Salvador">El Salvador</option>
                        <option value="FK" label="Falkland Islands">Falkland Islands</option>
                        <option value="GF" label="French Guiana">French Guiana</option>
                        <option value="GL" label="Greenland">Greenland</option>
                        <option value="GD" label="Grenada">Grenada</option>
                        <option value="GP" label="Guadeloupe">Guadeloupe</option>
                        <option value="GT" label="Guatemala">Guatemala</option>
                        <option value="GY" label="Guyana">Guyana</option>
                        <option value="HT" label="Haiti">Haiti</option>
                        <option value="HN" label="Honduras">Honduras</option>
                        <option value="JM" label="Jamaica">Jamaica</option>
                        <option value="MQ" label="Martinique">Martinique</option>
                        <option value="MX" label="Mexico">Mexico</option>
                        <option value="MS" label="Montserrat">Montserrat</option>
                        <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="NI" label="Nicaragua">Nicaragua</option>
                        <option value="PA" label="Panama">Panama</option>
                        <option value="PY" label="Paraguay">Paraguay</option>
                        <option value="PE" label="Peru">Peru</option>
                        <option value="PR" label="Puerto Rico">Puerto Rico</option>
                        <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                        <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="LC" label="Saint Lucia">Saint Lucia</option>
                        <option value="MF" label="Saint Martin">Saint Martin</option>
                        <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                        <option value="SR" label="Suriname">Suriname</option>
                        <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                        <option value="US" label="United States">United States</option>
                        <option value="UY" label="Uruguay">Uruguay</option>
                        <option value="VE" label="Venezuela">Venezuela</option>
                    </optgroup>
                    <optgroup id="country-optgroup-Asia" label="Asia">
                        <option value="AF" label="Afghanistan">Afghanistan</option>
                        <option value="AM" label="Armenia">Armenia</option>
                        <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                        <option value="BH" label="Bahrain">Bahrain</option>
                        <option value="BD" label="Bangladesh">Bangladesh</option>
                        <option value="BT" label="Bhutan">Bhutan</option>
                        <option value="BN" label="Brunei">Brunei</option>
                        <option value="KH" label="Cambodia">Cambodia</option>
                        <option value="CN" label="China">China</option>
                        <option value="GE" label="Georgia">Georgia</option>
                        <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                        <option value="IN" label="India">India</option>
                        <option value="ID" label="Indonesia">Indonesia</option>
                        <option value="IR" label="Iran">Iran</option>
                        <option value="IQ" label="Iraq">Iraq</option>
                        <option value="IL" label="Israel">Israel</option>
                        <option value="JP" label="Japan">Japan</option>
                        <option value="JO" label="Jordan">Jordan</option>
                        <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                        <option value="KW" label="Kuwait">Kuwait</option>
                        <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="LA" label="Laos">Laos</option>
                        <option value="LB" label="Lebanon">Lebanon</option>
                        <option value="MO" label="Macau SAR China">Macau SAR China</option>
                        <option value="MY" label="Malaysia" selected>Malaysia</option>
                        <option value="MV" label="Maldives">Maldives</option>
                        <option value="MN" label="Mongolia">Mongolia</option>
                        <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                        <option value="NP" label="Nepal">Nepal</option>
                        <option value="NT" label="Neutral Zone">Neutral Zone</option>
                        <option value="KP" label="North Korea">North Korea</option>
                        <option value="OM" label="Oman">Oman</option>
                        <option value="PK" label="Pakistan">Pakistan</option>
                        <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
                        <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
                        <option value="PH" label="Philippines">Philippines</option>
                        <option value="QA" label="Qatar">Qatar</option>
                        <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                        <option value="SG" label="Singapore">Singapore</option>
                        <option value="KR" label="South Korea">South Korea</option>
                        <option value="LK" label="Sri Lanka">Sri Lanka</option>
                        <option value="SY" label="Syria">Syria</option>
                        <option value="TW" label="Taiwan">Taiwan</option>
                        <option value="TJ" label="Tajikistan">Tajikistan</option>
                        <option value="TH" label="Thailand">Thailand</option>
                        <option value="TL" label="Timor-Leste">Timor-Leste</option>
                        <option value="TR" label="Turkey">Turkey</option>
                        <option value="TM" label="Turkmenistan">Turkmenistan</option>
                        <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                        <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                        <option value="VN" label="Vietnam">Vietnam</option>
                        <option value="YE" label="Yemen">Yemen</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <h4 class="col-sm-6 p-2">Correspondence Address</h4>
            <div class="col-sm-6">
                <div class="form-check">
                <input type="checkbox" name="sameAsPermenant" id="same-address" class="form-check-input"/>
                    <label class="form-check-label" for="same-address">
                        Same as Permanent Address
                    </label>
                </div>
            </div>
        </div>
        <br>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Address 1*</label>
            <div class="col-md-5">
                <input type="text" name="address1c" id="address1c" class="form-control mb-10px" placeholder="ADDRESS 1" />

            </div><label class="form-label col-form-label col-md-1">Address 2</label>
            <div class="col-md-5">
                <input type="text" name="address2c" id="address2c" class="form-control mb-5px" placeholder="ADDRESS 2" />

            </div>
        </div>

        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">Postcode*</label>
            <div class="col-md-5">
                <input type="text" name="postcodec" id="postcodec" class="form-control mb-10px" placeholder="00000" />

            </div><label class="form-label col-form-label col-md-1">City*</label>
            <div class="col-md-5">
                <input type="text" name="cityc" id="cityc" class="form-control mb-5px" placeholder="CITY" />

            </div>
        </div>
        <div class="row mb-15px">
            <label class="form-label col-form-label col-md-1">State*</label>
            <div class="col-md-5">
                <select class="form-select" name="statec" id="statec" >
                    <option label="PLEASE CHOOSE" selected="selected"></option>
                    <option value="Johor" label="Johor">Johor</option>
                    <option value="Kedah" label="Kedah">Kedah</option>
                    <option value="Kelantan" label="Kelantan">Kelantan</option>
                    <option value="Negeri Sembilan" label="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang" label="Pahang">Pahang</option>
                    <option value="Penang" label="Penang">Penang</option>
                    <option value="Perak" label="Perak">Perak</option>
                    <option value="Perlis" label="Perlis">Perlis</option>
                    <option value="Sabah" label="Sabah">Sabah</option>
                    <option value="Sarawak" label="Sarawak">Sarawak</option>
                    <option value="Selangor" label="Selangor">Selangor</option>
                    <option value="Terengganu" label="Terengganu">Terengganu</option>
                    <option value="Kuala Lumpur" label="Kuala Lumpur">Kuala Lumpur</option>
                    <option value="Labuan" label="Labuan">Labuan</option>
                    <option value="Putrajaya" label="Putrajaya">Putrajaya</option>
                </select>
            </div>
            <label class="form-label col-form-label col-md-1">Country*</label>
            <div class="col-md-5">
            <select class="form-select" name="countryc" id="countryc" >
                    <option label="PLEASE CHOOSE" disabled></option>
                    <optgroup id="country-optgroup-Africa" label="Africa">
                        <option value="DZ" label="Algeria">Algeria</option>
                        <option value="AO" label="Angola">Angola</option>
                        <option value="BJ" label="Benin">Benin</option>
                        <option value="BW" label="Botswana">Botswana</option>
                        <option value="BF" label="Burkina Faso">Burkina Faso</option>
                        <option value="BI" label="Burundi">Burundi</option>
                        <option value="CM" label="Cameroon">Cameroon</option>
                        <option value="CV" label="Cape Verde">Cape Verde</option>
                        <option value="CF" label="Central African Republic">Central African Republic</option>
                        <option value="TD" label="Chad">Chad</option>
                        <option value="KM" label="Comoros">Comoros</option>
                        <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                        <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                        <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                        <option value="DJ" label="Djibouti">Djibouti</option>
                        <option value="EG" label="Egypt">Egypt</option>
                        <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="ER" label="Eritrea">Eritrea</option>
                        <option value="ET" label="Ethiopia">Ethiopia</option>
                        <option value="GA" label="Gabon">Gabon</option>
                        <option value="GM" label="Gambia">Gambia</option>
                        <option value="GH" label="Ghana">Ghana</option>
                        <option value="GN" label="Guinea">Guinea</option>
                        <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="KE" label="Kenya">Kenya</option>
                        <option value="LS" label="Lesotho">Lesotho</option>
                        <option value="LR" label="Liberia">Liberia</option>
                        <option value="LY" label="Libya">Libya</option>
                        <option value="MG" label="Madagascar">Madagascar</option>
                        <option value="MW" label="Malawi">Malawi</option>
                        <option value="ML" label="Mali">Mali</option>
                        <option value="MR" label="Mauritania">Mauritania</option>
                        <option value="MU" label="Mauritius">Mauritius</option>
                        <option value="YT" label="Mayotte">Mayotte</option>
                        <option value="MA" label="Morocco">Morocco</option>
                        <option value="MZ" label="Mozambique">Mozambique</option>
                        <option value="NA" label="Namibia">Namibia</option>
                        <option value="NE" label="Niger">Niger</option>
                        <option value="NG" label="Nigeria">Nigeria</option>
                        <option value="RW" label="Rwanda">Rwanda</option>
                        <option value="RE" label="Réunion">Réunion</option>
                        <option value="SH" label="Saint Helena">Saint Helena</option>
                        <option value="SN" label="Senegal">Senegal</option>
                        <option value="SC" label="Seychelles">Seychelles</option>
                        <option value="SL" label="Sierra Leone">Sierra Leone</option>
                        <option value="SO" label="Somalia">Somalia</option>
                        <option value="ZA" label="South Africa">South Africa</option>
                        <option value="SD" label="Sudan">Sudan</option>
                        <option value="SZ" label="Swaziland">Swaziland</option>
                        <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                        <option value="TZ" label="Tanzania">Tanzania</option>
                        <option value="TG" label="Togo">Togo</option>
                        <option value="TN" label="Tunisia">Tunisia</option>
                        <option value="UG" label="Uganda">Uganda</option>
                        <option value="EH" label="Western Sahara">Western Sahara</option>
                        <option value="ZM" label="Zambia">Zambia</option>
                        <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                    </optgroup>
                    <optgroup id="country-optgroup-Americas" label="Americas">
                        <option value="AI" label="Anguilla">Anguilla</option>
                        <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="AR" label="Argentina">Argentina</option>
                        <option value="AW" label="Aruba">Aruba</option>
                        <option value="BS" label="Bahamas">Bahamas</option>
                        <option value="BB" label="Barbados">Barbados</option>
                        <option value="BZ" label="Belize">Belize</option>
                        <option value="BM" label="Bermuda">Bermuda</option>
                        <option value="BO" label="Bolivia">Bolivia</option>
                        <option value="BR" label="Brazil">Brazil</option>
                        <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
                        <option value="CA" label="Canada">Canada</option>
                        <option value="KY" label="Cayman Islands">Cayman Islands</option>
                        <option value="CL" label="Chile">Chile</option>
                        <option value="CO" label="Colombia">Colombia</option>
                        <option value="CR" label="Costa Rica">Costa Rica</option>
                        <option value="CU" label="Cuba">Cuba</option>
                        <option value="DM" label="Dominica">Dominica</option>
                        <option value="DO" label="Dominican Republic">Dominican Republic</option>
                        <option value="EC" label="Ecuador">Ecuador</option>
                        <option value="SV" label="El Salvador">El Salvador</option>
                        <option value="FK" label="Falkland Islands">Falkland Islands</option>
                        <option value="GF" label="French Guiana">French Guiana</option>
                        <option value="GL" label="Greenland">Greenland</option>
                        <option value="GD" label="Grenada">Grenada</option>
                        <option value="GP" label="Guadeloupe">Guadeloupe</option>
                        <option value="GT" label="Guatemala">Guatemala</option>
                        <option value="GY" label="Guyana">Guyana</option>
                        <option value="HT" label="Haiti">Haiti</option>
                        <option value="HN" label="Honduras">Honduras</option>
                        <option value="JM" label="Jamaica">Jamaica</option>
                        <option value="MQ" label="Martinique">Martinique</option>
                        <option value="MX" label="Mexico">Mexico</option>
                        <option value="MS" label="Montserrat">Montserrat</option>
                        <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="NI" label="Nicaragua">Nicaragua</option>
                        <option value="PA" label="Panama">Panama</option>
                        <option value="PY" label="Paraguay">Paraguay</option>
                        <option value="PE" label="Peru">Peru</option>
                        <option value="PR" label="Puerto Rico">Puerto Rico</option>
                        <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                        <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="LC" label="Saint Lucia">Saint Lucia</option>
                        <option value="MF" label="Saint Martin">Saint Martin</option>
                        <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                        <option value="SR" label="Suriname">Suriname</option>
                        <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                        <option value="US" label="United States">United States</option>
                        <option value="UY" label="Uruguay">Uruguay</option>
                        <option value="VE" label="Venezuela">Venezuela</option>
                    </optgroup>
                    <optgroup id="country-optgroup-Asia" label="Asia">
                        <option value="AF" label="Afghanistan">Afghanistan</option>
                        <option value="AM" label="Armenia">Armenia</option>
                        <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                        <option value="BH" label="Bahrain">Bahrain</option>
                        <option value="BD" label="Bangladesh">Bangladesh</option>
                        <option value="BT" label="Bhutan">Bhutan</option>
                        <option value="BN" label="Brunei">Brunei</option>
                        <option value="KH" label="Cambodia">Cambodia</option>
                        <option value="CN" label="China">China</option>
                        <option value="GE" label="Georgia">Georgia</option>
                        <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                        <option value="IN" label="India">India</option>
                        <option value="ID" label="Indonesia">Indonesia</option>
                        <option value="IR" label="Iran">Iran</option>
                        <option value="IQ" label="Iraq">Iraq</option>
                        <option value="IL" label="Israel">Israel</option>
                        <option value="JP" label="Japan">Japan</option>
                        <option value="JO" label="Jordan">Jordan</option>
                        <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                        <option value="KW" label="Kuwait">Kuwait</option>
                        <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="LA" label="Laos">Laos</option>
                        <option value="LB" label="Lebanon">Lebanon</option>
                        <option value="MO" label="Macau SAR China">Macau SAR China</option>
                        <option value="MY" label="Malaysia" selected>Malaysia</option>
                        <option value="MV" label="Maldives">Maldives</option>
                        <option value="MN" label="Mongolia">Mongolia</option>
                        <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                        <option value="NP" label="Nepal">Nepal</option>
                        <option value="NT" label="Neutral Zone">Neutral Zone</option>
                        <option value="KP" label="North Korea">North Korea</option>
                        <option value="OM" label="Oman">Oman</option>
                        <option value="PK" label="Pakistan">Pakistan</option>
                        <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
                        <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
                        <option value="PH" label="Philippines">Philippines</option>
                        <option value="QA" label="Qatar">Qatar</option>
                        <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                        <option value="SG" label="Singapore">Singapore</option>
                        <option value="KR" label="South Korea">South Korea</option>
                        <option value="LK" label="Sri Lanka">Sri Lanka</option>
                        <option value="SY" label="Syria">Syria</option>
                        <option value="TW" label="Taiwan">Taiwan</option>
                        <option value="TJ" label="Tajikistan">Tajikistan</option>
                        <option value="TH" label="Thailand">Thailand</option>
                        <option value="TL" label="Timor-Leste">Timor-Leste</option>
                        <option value="TR" label="Turkey">Turkey</option>
                        <option value="TM" label="Turkmenistan">Turkmenistan</option>
                        <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                        <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                        <option value="VN" label="Vietnam">Vietnam</option>
                        <option value="YE" label="Yemen">Yemen</option>
                </select>
            </div>
        </div>

    

    <p class="text-end mb-0">
        <!-- <a href="javascript:;" id="prev_btn_addr_det" class="btn btn-white me-5px">Previous</a>  -->
       
        <button id="submitAddress" class="btn btn-primary">Save</button>
    </p>
    </form>

</div>
