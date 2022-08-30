@extends('layouts.dashboard')
@section('page-title', 'Edit Landing Page')

@section('content')
<style>
.uper {
  margin-top: 40px;
}

.img-landingPage {
  max-width: 100%;
  max-height: 400px;
}

.hidden {
  display: none;
}

.margin-vertical {
  margin-top: 3em;
  margin-bottom: 3em;
}

.card-header {
  display: flex;
  justify-content: space-between;
  line-height: 2.3em;
}
</style>
<div class="container-fluid px-4">
  <h1 class="mt-4">Edit Landing Page</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Landing Pages</li>
    <li class="breadcrumb-item active">Edit</li>
  </ol>
  <div class="container">
    <div class="card uper col-md-12">
      <form method="post" action="{{ route('landing-pages.update', $landingPage->id ) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-header">
          Edit Landing Page Data <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div><br />
          @endif
          <div class="form-group">
            <label for="publisher">Path:</label>
            <input type="text" class="form-control" name="path" id="path" value="{{ $landingPage->path }}" />
            <input type="hidden" name="old_path" value="{{ $landingPage->path }}" />
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <div class="d-flex flex-row align-items-center mb-4">
                  <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="publisher">Select Publisher</label><br />
                    <select name="publisher">
                      <option value="">--Select Publisher--</option>
                      @foreach($publishers as $publisher)
                      <option value="{{ $publisher->id }}"
                        {{ $landingPage->publisher == $publisher->id ? 'selected' : '' }}>{{ $publisher->publisher }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="d-flex flex-row align-items-center mb-4">
                  <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="template">Select Template</label><br />
                    <select name="template_id">
                      <option value="">--Select Template--</option>
                      @foreach($templates as $template)
                      <option value="{{ $template->id }}"
                        {{ $landingPage->template_id == $template->id ? 'selected' : '' }}>{{ $template->name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="d-flex flex-row align-items-center mb-4">
                  <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="publisher">Select Client</label><br />
                    <select name="client_id">
                      <option value="">--Select Client--</option>
                      @foreach($clients as $client)
                      <option value="{{ $client->id }}" {{ $landingPage->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="referral_code">Referral Code (Lead Form):</label>
            <input type="text" class="form-control" name="referral_code" id="referral_code"
              value="{{ $landingPage->referral_code }}" />
          </div>
          <div class="form-group">
            <label for="referral_code_intelliapp">Referral Code (Intelliapp):</label>
            <input type="text" class="form-control" name="referral_code_intelliapp" id="referral_code_intelliapp"
              value="{{ $landingPage->referral_code_intelliapp }}" />
          </div>
          <div class="form-group">
            <label for="ga_lp">Google Analytics Landing Page:</label>
            <input type="text" class="form-control" name="ga_lp" id="ga_lp" value="{{ $landingPage->ga_lp }}" />
          </div>
          <div class="form-group">
            <label for="ga_tp">Google Analytics Thank You Page:</label>
            <input type="text" class="form-control" name="ga_tp" id="ga_tp" value="{{ $landingPage->ga_tp }}" />
          </div>
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $landingPage->title }}" />
          </div>
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $landingPage->phone }}" />
          </div>
          <div class="form-group">
            <label for="main_title">Main Title:</label>
            <input type="text" class="form-control" name="main_title" id="main_title"
              value="{{ $landingPage->main_title }}" />
          </div>
          <div class="form-group">
            <label for="sub_title">Sub Title:</label>
            <input type="text" class="form-control" name="sub_title" id="sub_title"
              value="{{ $landingPage->sub_title }}" />
          </div>
          <div class="form-group">
            <label for="main_description">Main Description:</label>
            <textarea class="ckeditor form-control" name="main_description" id="main_description">
            {{ $landingPage->main_description }}
            </textarea>
          </div>
          <div class="form-group">
            <label for="body_copy">Body Copy</label>
            <textarea class="ckeditor form-control" name="body_copy" id="body_copy">
            {{ $landingPage->body_copy }}
            </textarea>
          </div>
          <div class="row margin-vertical">
            <div class="col-md-6">
              <label for="background">Hero Background:</label>
              <br />
              <img class="{{ $landingPage->background ? 'img-landingPage' : 'hidden' }}" title="Background Image"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->background }}" />
              <input type="file" name="background" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="background_mobile">Background (Mobile):</label>
              <br />
              <img class="{{ $landingPage->background_mobile ? 'img-landingPage' : 'hidden' }}"
                title="Background Mobile Image"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->background_mobile }}" />
              <input type="file" name="background_mobile" class="form-control">
            </div>
          </div>
          <div class="row margin-vertical">
            <div class="col-md-6">
              <label for="body_image_2">Body Image #2:</label>
              <br />
              <img class="{{ $landingPage->body_image_2 ? 'img-landingPage' : 'hidden' }}"
                title="Background Mobile Image"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->body_image_2 }}" />
              <input type="file" name="body_image_2" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="body_image_4">Body Image #4:</label>
              <br />
              <img class="{{ $landingPage->body_image_4 ? 'img-landingPage' : 'hidden' }}"
                title="Background Mobile Image"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->body_image_4 }}" />
              <input type="file" name="body_image_4" class="form-control">
              <div class="form-group">
                <label for="body_image_4_title">Body Image #4 Title:</label>
                <input type="text" class="form-control" name="body_image_4_title" id="body_image_4_title"
                  value="{{ $landingPage->body_image_4_title }}" />
              </div>
            </div>
          </div>

          <a href="#" id="extra-sections">Custom Sections</a><br />
          <div class="card extra-sections">
            <div class="card-header">
              Extra Sections
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="primary_video_link">Hero Video Youtube Link URL: (If applicable)</label>
                    <input type="text" class="form-control" name="primary_video_link" id="primary_video_link"
                      value="{{ $landingPage->primary_video_link }}" />
                  </div>
                </div>
              </div>
              {{--
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="secondary_description">Secondary Description:</label>
                    <textarea class="ckeditor form-control" name="secondary_description" id="secondary_description">
                    {{ $landingPage->secondary_description }}
              </textarea>
            </div>
          </div>
        </div>
        --}}
        <div class="row">
          <h4>Section 1</h4>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_1_title">Title:</label>
              <input type="text" class="form-control" name="extra_section_1_title" id="extra_section_1_title"
                value="{{ $landingPage->extra_section_1_title }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_1_video_link">Youtube Video Link:</label>
              <input type="text" class="form-control" name="extra_section_1_video_link" id="extra_section_1_video_link"
                value="{{ $landingPage->extra_section_1_video_link }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_1_caption">Caption:</label>
              <input type="text" class="form-control" name="extra_section_1_caption" id="extra_section_1_caption"
                value="{{ $landingPage->extra_section_1_caption }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_1_image">Image:</label>
              <img class="{{ $landingPage->extra_section_1_image ? 'img-landingPage' : 'hidden' }}"
                title="{{ $landingPage->extra_section_1_title }}"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->extra_section_1_image }}" />
              <input type="file" name="extra_section_1_image" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <h4>Section 2</h4>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_2_title">Title:</label>
              <input type="text" class="form-control" name="extra_section_2_title" id="extra_section_2_title"
                value="{{ $landingPage->extra_section_2_title }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_2_video_link">Youtube Video Link:</label>
              <input type="text" class="form-control" name="extra_section_2_video_link" id="extra_section_2_video_link"
                value="{{ $landingPage->extra_section_2_video_link }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_2_caption">Caption:</label>
              <input type="text" class="form-control" name="extra_section_2_caption" id="extra_section_2_caption"
                value="{{ $landingPage->extra_section_2_caption }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_2_image">Image:</label>
              <img class="{{ $landingPage->extra_section_2_image ? 'img-landingPage' : 'hidden' }}"
                title="{{ $landingPage->extra_section_2_title }}"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->extra_section_2_image }}" />
              <input type="file" name="extra_section_2_image" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <h4>Section 3</h4>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_3_title">Title:</label>
              <input type="text" class="form-control" name="extra_section_3_title" id="extra_section_3_title"
                value="{{ $landingPage->extra_section_3_title }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_3_video_link">Youtube Video Link:</label>
              <input type="text" class="form-control" name="extra_section_3_video_link" id="extra_section_3_video_link"
                value="{{ $landingPage->extra_section_3_video_link }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_3_caption">Caption:</label>
              <input type="text" class="form-control" name="extra_section_3_caption" id="extra_section_3_caption"
                value="{{ $landingPage->extra_section_3_caption }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_3_image">Image:</label>
              <img class="{{ $landingPage->extra_section_3_image ? 'img-landingPage' : 'hidden' }}"
                title="{{ $landingPage->extra_section_3_title }}"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->extra_section_3_image }}" />
              <input type="file" name="extra_section_3_image" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <h4>Section 4</h4>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_4_title">Title:</label>
              <input type="text" class="form-control" name="extra_section_4_title" id="extra_section_4_title"
                value="{{ $landingPage->extra_section_4_title }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_4_video_link">Youtube Video Link:</label>
              <input type="text" class="form-control" name="extra_section_4_video_link" id="extra_section_4_video_link"
                value="{{ $landingPage->extra_section_4_video_link }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_4_caption">Caption:</label>
              <input type="text" class="form-control" name="extra_section_4_caption" id="extra_section_4_caption"
                value="{{ $landingPage->extra_section_4_caption }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_4_image">Image:</label>
              <img class="{{ $landingPage->extra_section_4_image ? 'img-landingPage' : 'hidden' }}"
                title="{{ $landingPage->extra_section_4_title }}"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->extra_section_4_image }}" />
              <input type="file" name="extra_section_4_image" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <h4>Section 5</h4>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_5_title">Title:</label>
              <input type="text" class="form-control" name="extra_section_5_title" id="extra_section_5_title"
                value="{{ $landingPage->extra_section_5_title }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_5_video_link">Youtube Video Link:</label>
              <input type="text" class="form-control" name="extra_section_5_video_link" id="extra_section_5_video_link"
                value="{{ $landingPage->extra_section_5_video_link }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_5_caption">Caption:</label>
              <input type="text" class="form-control" name="extra_section_5_caption" id="extra_section_5_caption"
                value="{{ $landingPage->extra_section_5_caption }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_5_image">Image:</label>
              <img class="{{ $landingPage->extra_section_5_image ? 'img-landingPage' : 'hidden' }}"
                title="{{ $landingPage->extra_section_5_title }}"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->extra_section_5_image }}" />
              <input type="file" name="extra_section_5_image" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <h4>Section 6</h4>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_6_title">Title:</label>
              <input type="text" class="form-control" name="extra_section_6_title" id="extra_section_6_title"
                value="{{ $landingPage->extra_section_6_title }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_6_video_link">Youtube Video Link:</label>
              <input type="text" class="form-control" name="extra_section_6_video_link" id="extra_section_6_video_link"
                value="{{ $landingPage->extra_section_6_video_link }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_6_caption">Caption:</label>
              <input type="text" class="form-control" name="extra_section_6_caption" id="extra_section_6_caption"
                value="{{ $landingPage->extra_section_6_caption }}" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="extra_section_6_image">Image:</label>
              <img class="{{ $landingPage->extra_section_6_image ? 'img-landingPage' : 'hidden' }}"
                title="{{ $landingPage->extra_section_6_title }}"
                src="/uploads/{{ $landingPage->path }}/{{ $landingPage->extra_section_6_image }}" />
              <input type="file" name="extra_section_6_image" class="form-control">
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="row margin-vertical">
    <div class="col-md-6">
      <label for="region_graphic">Region Graphic:</label>
      <br />
      <img class="{{ $landingPage->region_graphic ? 'img-landingPage' : 'hidden' }}" title="Region Graphic Image"
        src="/uploads/{{ $landingPage->path }}/{{ $landingPage->region_graphic }}" />
      <input type="file" name="region_graphic" class="form-control">
    </div>
    <div class="col-md-6">
      <label for="region_graphic_mobile">Region Graphic (Mobile):</label>
      <br />
      <img class="{{ $landingPage->region_graphic_mobile ? 'img-landingPage' : 'hidden' }}"
        title="Region Graphic Mobile Image"
        src="/uploads/{{ $landingPage->path }}/{{ $landingPage->region_graphic_mobile }}" />
      <input type="file" name="region_graphic_mobile" class="form-control">
    </div>
  </div>
  <br />
  <div class="container">
    <div class="row col-md-12">
      <div class="col-md-4">
        <div class="form-group">
          <label for="benef1_caption_title">Caption 1 Title:</label>
          <input type="text" class="form-control" name="benef1_caption_title" id="benef1_caption_title"
            value="{{ $landingPage->benef1_caption_title }}" />
        </div>
        <div class="form-group">
          <label for="benef1_caption">Caption 1 Text:</label>
          <input type="text" class="form-control" name="benef1_caption" id="benef1_caption"
            value="{{ $landingPage->benef1_caption }}" />
        </div>
        <div class="form-group">
          <br />
          <img class="{{ $landingPage->benef1_figure ? 'img-landingPage' : 'hidden' }}"
            title="{{ $landingPage->benef1_caption_title }}"
            src="/uploads/{{ $landingPage->path }}/{{ $landingPage->benef1_figure }}" />
          <input type="file" name="benef1_figure" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="benef2_caption_title">Caption 2 Title:</label>
          <input type="text" class="form-control" name="benef2_caption_title" id="benef2_caption_title"
            value="{{ $landingPage->benef2_caption_title }}" />
        </div>
        <div class="form-group">
          <label for="benef2_caption">Caption 2 Text:</label>
          <input type="text" class="form-control" name="benef2_caption" id="benef2_caption"
            value="{{ $landingPage->benef2_caption }}" />
        </div>
        <div class="form-group">
          <br />
          <img class="{{ $landingPage->benef2_figure ? 'img-landingPage' : 'hidden' }}"
            title="{{ $landingPage->benef2_caption_title }}"
            src="/uploads/{{ $landingPage->path }}/{{ $landingPage->benef2_figure }}" />
          <input type="file" name="benef2_figure" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="benef3_caption_title">Caption 3 Title:</label>
          <input type="text" class="form-control" name="benef3_caption_title" id="benef3_caption_title"
            value="{{ $landingPage->benef3_caption_title }}" />
        </div>
        <div class="form-group">
          <label for="benef3_caption">Caption 3 Text:</label>
          <input type="text" class="form-control" name="benef3_caption" id="benef3_caption"
            value="{{ $landingPage->benef3_caption }}" />
        </div>
        <div class="form-group">
          <br />
          <img class="{{ $landingPage->benef3_figure ? 'img-landingPage' : 'hidden' }}"
            title="{{ $landingPage->benef3_caption_title }}"
            src="/uploads/{{ $landingPage->path }}/{{ $landingPage->benef3_figure }}" />
          <input type="file" name="benef3_figure" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="benef4_caption_title">Caption 4 Title:</label>
          <input type="text" class="form-control" name="benef4_caption_title" id="benef4_caption_title"
            value="{{ $landingPage->benef4_caption_title }}" />
        </div>
        <div class="form-group">
          <label for="benef4_caption">Caption 4 Text:</label>
          <input type="text" class="form-control" name="benef4_caption" id="benef4_caption"
            value="{{ $landingPage->benef4_caption }}" />
        </div>
        <div class="form-group">
          <br />
          <img class="{{ $landingPage->benef4_figure ? 'img-landingPage' : 'hidden' }}"
            title="{{ $landingPage->benef4_caption_title }}"
            src="/uploads/{{ $landingPage->path }}/{{ $landingPage->benef4_figure }}" />
          <input type="file" name="benef4_figure" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="benef5_caption_title">Caption 5 Title:</label>
          <input type="text" class="form-control" name="benef5_caption_title" id="benef5_caption_title"
            value="{{ $landingPage->benef5_caption_title }}" />
        </div>
        <div class="form-group">
          <label for="benef5_caption">Caption 5 Text:</label>
          <input type="text" class="form-control" name="benef5_caption" id="benef5_caption"
            value="{{ $landingPage->benef5_caption }}" />
        </div>
        <div class="form-group">
          <br />
          <img class="{{ $landingPage->benef5_figure ? 'img-landingPage' : 'hidden' }}"
            title="{{ $landingPage->benef5_caption_title }}"
            src="/uploads/{{ $landingPage->path }}/{{ $landingPage->benef5_figure }}" />
          <input type="file" name="benef5_figure" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="benef6_caption_title">Caption 6 Title:</label>
          <input type="text" class="form-control" name="benef6_caption_title" id="benef6_caption_title"
            value="{{ $landingPage->benef6_caption_title }}" />
        </div>
        <div class="form-group">
          <label for="benef6_caption">Caption 6 Text:</label>
          <input type="text" class="form-control" name="benef6_caption" id="benef6_caption"
            value="{{ $landingPage->benef6_caption }}" />
        </div>
        <div class="form-group">
          <br />
          <img class="{{ $landingPage->benef6_figure ? 'img-landingPage' : 'hidden' }}"
            title="{{ $landingPage->benef6_caption_title }}"
            src="/uploads/{{ $landingPage->path }}/{{ $landingPage->benef6_figure }}" />
          <input type="file" name="benef6_figure" class="form-control">
        </div>
      </div>
    </div>
  </div>

  <div class="spacing-small"></div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a class="btn btn-primary" href="{{ route('landing-pages.index') }}">Cancel</a>
</div>
</form>
</div>
<div class="spacing-large"></div>
</div>
@endsection