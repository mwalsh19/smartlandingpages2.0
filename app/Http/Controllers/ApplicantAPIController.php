<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApplicantRequest;
use App\Applicants;

class ApplicantAPIController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Applicants::all();
    }
 
    public function show($id)
    {
        $applicant = Applicants::find($id);
        if ($applicant) {
        	return response()->json($applicant, 200);
        }
        return response()->json([
                'data' => 'Resource not found'
            ], 404);
    } 

    public function store(ApplicantRequest $request)
    {
        $applicant = Applicants::create($request->all());

        $response = $this->tenstreetSubmission($request);
        
        return response()->json($applicant, 201); 
    }

    public function update(Request $request, $id)
    {
        $applicant = Applicants::findOrFail($id);
        $applicant->update($request->all());
 
        return response()->json($applicant, 200);
    }

    public function delete(Request $request, $id)
    {
        $applicant = Applicants::findOrFail($id);
        $applicant->delete();

        return response()->json(null, 204);
    } 

    public function tenstreetSubmission($applicant)
    {
        $givenName = $applicant['first_name'];
        $familyName = $applicant['last_name'];
        $municipality = $applicant['city'];
        $region = $applicant['state'];
        $postalCode = $applicant['zip'];
        $email = $applicant['email'];
        $primaryPhone = $applicant['phone_number'];
        $years_experience = $applicant['experience'];
        $cdl_valid = $applicant['cdl'];
        $address1 = $applicant['address'];

        $customer = $applicant['customer'];

        if ($customer === 'systemTrans') {
            $isDev = false;
            $need_redirect = false;

            $clientID = '247';
            $password = 'sb*V6*0!DacfveNbVgb9';
            $service = 'subject_upload';
            $mode = $isDev ? 'DEV' : 'PROD';

            $source = 'LACED Lead';
            $companyID = $isDev ? '15' : '806';
            $companyName = $isDev ? 'Laced Agency' : 'TransSystem';
            $post_address = $isDev ? 'https://devdashboard.tenstreet.com/post/' : 'https://api.tenstreet.com';
            $appReferrer = $applicant['referral_code'];

            $xml_data = '
                <TenstreetData>
                    <Authentication>
                        <ClientId>' . $clientID . '</ClientId>
                        <Password>' . $password . '</Password>
                        <Service>' . $service . '</Service>
                    </Authentication>
                    <Mode>' . $mode . '</Mode>
                    <Source>' . $source . '</Source>
                    <CompanyId>' . $companyID . '</CompanyId>
                    <CompanyName>' . $companyName . '</CompanyName>
                    <PersonalData>
                        <PersonName>
                            <GivenName>' . $givenName . '</GivenName>
                            <FamilyName>' . $familyName . '</FamilyName>
                        </PersonName>
                        <PostalAddress>
                            <CountryCode>US</CountryCode>
                            <Municipality>' . $municipality . '</Municipality>
                            <Region>' . $region . '</Region>
                            <PostalCode>' . $postalCode . '</PostalCode>
                            <Address1>' . $address1 . '</Address1>
                        </PostalAddress>
                        <ContactData PreferredMethod="PrimaryPhone">
                            <InternetEmailAddress>' . $email . '</InternetEmailAddress>
                            <PrimaryPhone>' . $primaryPhone . '</PrimaryPhone>
                        </ContactData>
                    </PersonalData>
                    <ApplicationData>
                        <AppReferrer>' . $appReferrer . '</AppReferrer>
                        <DisplayFields>
                            <DisplayField>
                                <DisplayPrompt>Years Experience:</DisplayPrompt>
                                <DisplayValue>' . $years_experience . '</DisplayValue>
                            </DisplayField>
                            <DisplayField>
                                <DisplayPrompt>Do you have your class A CDL?</DisplayPrompt>
                                <DisplayValue>' . $cdl_valid . '</DisplayValue>
                            </DisplayField>
                        </DisplayFields>
                    </ApplicationData>
                </TenstreetData>';
            
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $post_address);
                curl_setopt($ch, CURLOPT_VERBOSE, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:text/xml;charset=uft-8'));
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);

                $response_xml = curl_exec($ch);
                curl_close($ch);

                $responseObject = simplexml_load_string($response_xml);

            if ($responseObject->Status == 'Accepted') {
                return 'Accepted';
            } else {
                return 'Rejected';
            }
        }
    }
}
