<?php

namespace App\Http\Controllers;

use App\Applicants;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicants::all();

        return view('applicants.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicants::findOrFail($id);
        return view('applicants.view', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicants $applicants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicants $applicants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicants::findOrFail($id);
        $applicant->delete();

        return redirect('/dashboard/applicants')->with('success', 'Applicant was successfully deleted');
    }

    public function tenstreet($id)
    {
        $applicant = Applicants::findOrFail($id);

        if ($applicant->tenstreet) {
            return redirect('/dashboard/applicants')->with('error', 'This applicant has already been submitted.');
        }

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
        $appReferrer = $applicant->referral_code;

        $givenName = $applicant->first_name;
        $familyName = $applicant->last_name;
        $municipality = $applicant->city;
        $region = $applicant->state;
        $postalCode = $applicant->zip;
        $email = $applicant->email;
        $primaryPhone = $applicant->phone_number;
        $years_experience = $applicant->experience;
        $cdl_valid = $applicant->cdl;
        $address1 = $applicant->address;

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
            Applicants::whereId($id)->update(['tenstreet' => 1]);
            return redirect('/dashboard/applicants')->with('success', 'Applicant was submitted to tenstreet');
        } else {
            return redirect('/dashboard/applicants')->with('error', $response_xml);
        }
    }
}
