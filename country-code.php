<?php
class CountryCode{
    
    public function getCountryCode($phone){
       $country_code = $this->getCountryCodeApi($phone) ? $this->getCountryCodeApi($phone) : $this->getCountryCodeArr($phone);
       return $country_code;
    }
    
    public function getCountryCodeApi($phone){
        $response = @file_get_contents( 'http://ec2-54-67-86-85.us-west-1.compute.amazonaws.com/api/api.php?ANI=' . urlencode($phone) );
        if ( $response ) {
            $response = json_decode($response);
            $country_code = $response->countryPrefix;
            return [
                'country_code' => $country_code,
                'number' => $this->getNumber($phone, $country_code),
            ];
        } else {
            $country_code = false;
        }
        return false;
    }
    
    public function getCountryCodeArr($phone){
        $country_codes = $this->countryCodes();
        $phone = ltrim($phone, '+');
        foreach($country_codes as $code){
            if( $code == substr( $phone, 0, strlen($code) ) ) {
                $country_code = $code;
                break;
            }
        }
        if ( $country_code ) {
            return [
                'country_code' => $country_code,
                'number' => $this->getNumber($phone, $country_code),
            ];
        }
        return false;
    }
    
    public function getNumber($phone, $prefix){
        $number = str_replace( ['+', '-', ' '], '', $phone);
        $number = substr_replace( $number, '', 0, strlen($prefix) ); 
        return $number;
    }
    
    public function getCountryNameByCode($code){
        $country_names = array_flip( $this->countryCodes() );
        return $country_names[$code] ? $country_names[$code] : false;
    }
    
    public function getCountryCodeByName($name){
        $country_codes = $this->countryCodes();
        return $country_codes[$name] ? $country_codes[$name] : false;
    }
    
    public function countryCodes(){
        return [
            'Ascension' => '247',
            'Andorra' => '376',
            'United Arab Emirates' => '971',
            'Afghanistan' => '93',
            'Albania' => '355',
            'Armenia' => '374',
            'Caribbean Netherlands' => '599',
            'Netherlands Antilles' => '599',
            'Angola' => '244',
            'Argentina' => '54',
            'Austria' => '43',
            'Australia' => '61',
            'Aruba' => '297',
            'Azerbaijan' => '994',
            'Bosnia and Herzegovina' => '387',
            'Bangladesh' => '880',
            'Belgium' => '32',
            'Burkina Faso' => '226',
            'Bulgaria' => '359',
            'Bahrain' => '973',
            'Burundi' => '257',
            'Benin' => '229',
            'Bermuda' => '1441',
            'Brunei Darussalam' => '673',
            'Bolivia' => '591',
            'Brazil' => '55',
            'Bahamas' => '1242',
            'Bhutan' => '975',
            'Botswana' => '267',
            'Belarus' => '375',
            'Belize' => '501',
            'Dem. Rep. Congo' => '243',
            'Central African Republic' => '236',
            'Congo (Brazzaville)' => '242',
            'Switzerland' => '41',
            'Cote d’Ivoire (Ivory Coast)' => '225',
            'Cook Islands' => '682',
            'Chile' => '56',
            'Cameroon' => '237',
            'China (PRC)' => '86',
            'Colombia' => '57',
            'Costa Rica' => '506',
            'Cuba' => '53',
            'Cape Verde' => '238',
            'Curacao' => '599', 'Cyprus' => '357', 'Czech Republic' => '420', 'Germany' => '49',
            'Djibouti' => '253', 'Denmark' => '45',
            'Algeria' => '213', 'Ecuador ' => '593', 'Ecuador' => '593', 'Estonia ' => '372', 'Estonia' => '372', 'Egypt' => '20',
            'Eritrea' => '291', 'Spain' => '34', 'Ethiopia' => '251', 'Finland' => '358', 'Fiji' => '679', 'Falkland Islands' => '500',
            'F.S. Micronesia' => '691', 'Faroe Islands' => '298', 'Mayotte' => '262', 'France' => '33', 'St Pierre & Miquelon' => '508',
            'Guadeloupe' => '590', 'Gabon' => '241', 'Rep. of Georgia' => '995', 'Guiana (French)' => '594',
            'Ghana' => '233', 'Gibraltar' => '350', 'Greenland' => '299', 'Gambia' => '220', 'Guinea' => '224', 'Equatorial Guinea' => '240',
            'Greece' => '30', 'Guatemala' => '502', 'Guinea-Bissau' => '245', 'Guyana' => '592', 'Hong Kong' => '852',
            'Honduras' => '504', 'Croatia' => '385', 'Haiti' => '509', 'Hungary' => '36', 'Indonesia ' => '628',
            'Indonesia' => '62', 'Ireland' => '353', 'Israel' => '972', 'India' => '91', 'Diego Garcia' => '246', 'Iraq' => '964', 'Iran' => '98', 'Iceland' => '354', 'Italy' => '39',
            'Jordan' => '962', 'Japan ' => '81', 'Japan' => '81', 'Kenya' => '254', 'Kyrgyzstan' => '996',
            'Cambodia' => '855', 'Kiribati' => '686', 'Comoros' => '269',
            'DPR Korea (North)' => '850', 'Korea (South)' => '82', 'Kuwait' => '965', 'Kazakhstan' => '76',
            'Kazakhstan ' => '77', 'Laos' => '856', 'Lebanon ' => '961', 'Lebanon' => '961',
            'Liechtenstein' => '423', 'Sri Lanka' => '94', 'Liberia' => '231', 'Lesotho' => '266', 'Lithuania' => '370', 'Luxembourg' => '352',
            'Latvia' => '371', 'Libya' => '218', 'Morocco' => '212', 'Monaco' => '377',
            'Moldova' => '373', 'Montenegro' => '382', 'Madagascar' => '261', 'Marshall Islands' => '692', 'Republic of Macedonia' => '389',
            'Mali' => '223', 'Burma (Myanmar)' => '95', 'Mongolia' => '976',
            'Macau' => '853', 'Martinique' => '596', 'Mauritania' => '222',
            'Malta' => '356', 'Mauritius' => '230', 'Maldives' => '960', 'Malawi' => '265',
            'Mexico' => '52', 'Malaysia ' => '60', 'Mozambique' => '258',
            'Namibia' => '264', 'New Caledonia' => '687', 'Niger' => '227',
            'Nigeria' => '234', 'Nicaragua' => '505', 'Netherlands' => '31', 'Norway' => '47',
            'Nepal' => '977', 'Nauru' => '674', 'Niue' => '683', 'New Zealand' => '64',
            'Oman' => '968', 'Panama' => '507', 'Peru' => '51', 'French Polynesia' => '689', 'Papua New Guinea' => '675',
            'Philippines' => '63', 'Pakistan' => '92', 'Poland' => '48', 'Palestine' => '970', 'Portugal' => '351', 'Palau' => '680',
            'Paraguay' => '595', 'Qatar' => '974', 'Reunion' => '262', 'Romania' => '40', 'Serbia' => '381', 'Russia' => '7', 'Rwanda' => '250',
            'Saudi Arabia' => '966', 'Solomon Islands ' => '677', 'Solomon Islands' => '677',
            'Seychelles' => '248', 'Sudan' => '249', 'Sweden' => '46', 'Singapore' => '65', 'Saint Helena' => '290',
            'Tristan da Cunha' => '290', 'Slovenia' => '386', 'Slovakia' => '421', 'Sierra Leone' => '232', 'San Marino' => '378',
            'Senegal' => '221', 'Somalia' => '252', 'Suriname ' => '597',
            'Suriname' => '597', 'South Sudan' => '211', 'Sao Tome and Principe' => '239', 'El Salvador' => '503',
            'Syrian Arab Republic' => '963', 'Swaziland' => '268',
            'Chad' => '235', 'Togo' => '228', 'Thailand ' => '66', 'Thailand' => '66', 'Tajikistan' => '992', 'Tokelau' => '690',
            'East Timor' => '670', 'Turkmenistan' => '993', 'Tunisia' => '216',
            'Tonga' => '676', 'Turkey' => '90',
            'Taiwan' => '886', 'Tanzania' => '255', 'Ukraine' => '380', 'Uganda' => '256', 'United Kingdom' => '44', 'Uruguay' => '598',
            'Uzbekistan' => '998', 'Venezuela' => '58',
            'Vietnam' => '84', 'Vanuatu ' => '678',
            'Vanuatu' => '678', 'Wallis and Futuna' => '681', 'Samoa' => '685', 'Yemen ' => '967', 'Yemen' => '967',
            'South Africa' => '27', 'Zambia' => '260', 'Zimbabwe' => '263', 'USA and Canada' => '1',
        ];
    }
}
