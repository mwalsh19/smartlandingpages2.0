@extends('layouts.dashboard')
@section('page-title', 'Create Landing Page')

@section('content')
<style>
.uper {
  margin-top: 40px;
}

.margin-vertical {
  margin-top: 3em;
  margin-bottom: 3em;
}
</style>
<div class="container-fluid px-4">
  <h1 class="mt-4">Create Landing Page</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Landing Pages</li>
    <li class="breadcrumb-item active">Create</li>
  </ol>
  <div class="container">
    <div class="card uper col-md-12">
      <div class="card-header">
        Add New Landing Page
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
        <form method="post" action="{{ route('landing-pages.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="publisher">Path:</label>
            <input type="text" class="form-control" name="path" id="path" value="{{ old('path') }}" />
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <div class="d-flex flex-row align-items-center mb-4">
                  <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="publisher">Select Publisher</label><br />
                    <select name="publisher">
                      <option value="" {{ old('publisher') ? '' : 'selected' }}>--Select Publisher--</option>
                      @foreach($publishers as $publisher)
                      <option value="{{ $publisher->id }}" {{ old('publisher') == $publisher->id ? 'selected' : '' }}>
                        {{ $publisher->publisher }}
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
                      <option value="" {{ old('template') ? '' : 'selected' }}>--Select Template--</option>
                      @foreach($templates as $template)
                      <option value="{{ $template->id }}" {{ old('template_id') == $template->id ? 'selected' : '' }}>
                        {{ $template->name }}
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
                      <option value="" {{ old('client_id') ? '' : 'selected' }}>--Select Client--</option>
                      @foreach($clients as $client)
                      <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="referral_code">Referral Code (Lead Form):</label>
              <input type="text" class="form-control" name="referral_code" id="referral_code"
                value="{{ old('referral_code') }}" />
            </div>
            <div class="form-group">
              <label for="referral_code_intelliapp">Referral Code (Intelliapp):</label>
              <input type="text" class="form-control" name="referral_code_intelliapp" id="referral_code_intelliapp"
                value="{{ old('referral_code_intelliapp') }}" />
            </div>
            <div class="form-group">
              <label for="ga_lp">Google Analytics Landing Page:</label>
              <input type="text" class="form-control" name="ga_lp" id="ga_lp" value="{{ old('ga_lp') }}" />
            </div>
            <div class="form-group">
              <label for="ga_tp">Google Analytics Thank You Page:</label>
              <input type="text" class="form-control" name="ga_tp" id="ga_tp" value="{{ old('ga_tp') }}" />
            </div>
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" />
            </div>
            <div class="form-group">
              <label for="main_title">Main Title:</label>
              <input type="text" class="form-control" name="main_title" id="main_title"
                value="{{ old('main_title') }}" />
            </div>
            <div class="form-group">
              <label for="sub_title">Sub Title:</label>
              <input type="text" class="form-control" name="sub_title" id="sub_title" value="{{ old('sub_title') }}" />
            </div>
            <div class="form-group">
              <label for="main_description">Main Description:</label>
              <textarea class="ckeditor form-control" name="main_description" id="main_description">
              {{ old('main_description') }}
              </textarea>
            </div>
            <div class="form-group">
              <label for="body_copy">Body Copy</label>
              <textarea class="ckeditor form-control" name="body_copy" id="body_copy">
              {{ old('body_copy') }}
              </textarea>
            </div>
            <div class="row margin-vertical">
              <div class="col-md-6">
                <label for="background">Hero Background:</label>
                <input type="file" name="background" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="background_mobile">Background (Mobile):</label>
                <input type="file" name="background_mobile" class="form-control">
              </div>
            </div>
            <div class="row margin-vertical">
              <div class="col-md-6">
                <label for="body_image_2">Body Image #2:</label>
                <input type="file" name="body_image_2" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="body_image_4">Body Image #4:</label>
                <input type="file" name="body_image_4" class="form-control">
                <div class="form-group">
                  <label for="body_image_4_title">Body Image #4 Title:</label>
                  <input type="text" class="form-control" name="body_image_4_title" id="body_image_4_title"
                    value="{{ old('body_image_4_title') }}" />
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
                        value="{{ old('primary_video_link') }}" />
                    </div>
                  </div>
                </div>
                {{-- <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="secondary_description">Secondary Description:</label>
                    <textarea class="ckeditor form-control" name="secondary_description" id="secondary_description">
                    {{ old('secondary_description') }}
                </textarea>
              </div>
            </div>
          </div> --}}
          <div class="row">
            <h4>Section 1</h4>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_1_title">Title:</label>
                <input type="text" class="form-control" name="extra_section_1_title" id="extra_section_1_title"
                  value="{{ old('extra_section_1_title') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_1_video_link">Youtube Video Link:</label>
                <input type="text" class="form-control" name="extra_section_1_video_link"
                  id="extra_section_1_video_link" value="{{ old('extra_section_1_video_link') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_1_caption">Caption:</label>
                <input type="text" class="form-control" name="extra_section_1_caption" id="extra_section_1_caption"
                  value="{{ old('extra_section_1_caption') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_1_image">Image:</label>
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
                  value="{{ old('extra_section_2_title') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_2_video_link">Youtube Video Link:</label>
                <input type="text" class="form-control" name="extra_section_2_video_link"
                  id="extra_section_2_video_link" value="{{ old('extra_section_2_video_link') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_2_caption">Caption:</label>
                <input type="text" class="form-control" name="extra_section_2_caption" id="extra_section_2_caption"
                  value="{{ old('extra_section_2_caption') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_2_image">Image:</label>
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
                  value="{{ old('extra_section_3_title') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_3_video_link">Youtube Video Link:</label>
                <input type="text" class="form-control" name="extra_section_3_video_link"
                  id="extra_section_3_video_link" value="{{ old('extra_section_3_video_link') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_3_caption">Caption:</label>
                <input type="text" class="form-control" name="extra_section_3_caption" id="extra_section_3_caption"
                  value="{{ old('extra_section_3_caption') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_3_image">Image:</label>
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
                  value="{{ old('extra_section_4_title') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_4_video_link">Youtube Video Link:</label>
                <input type="text" class="form-control" name="extra_section_4_video_link"
                  id="extra_section_4_video_link" value="{{ old('extra_section_4_video_link') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_4_caption">Caption:</label>
                <input type="text" class="form-control" name="extra_section_4_caption" id="extra_section_4_caption"
                  value="{{ old('extra_section_4_caption') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_4_image">Image:</label>
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
                  value="{{ old('extra_section_5_title') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_5_video_link">Youtube Video Link:</label>
                <input type="text" class="form-control" name="extra_section_5_video_link"
                  id="extra_section_5_video_link" value="{{ old('extra_section_5_video_link') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_5_caption">Caption:</label>
                <input type="text" class="form-control" name="extra_section_5_caption" id="extra_section_5_caption"
                  value="{{ old('extra_section_5_caption') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_5_image">Image:</label>
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
                  value="{{ old('extra_section_6_title') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_6_video_link">Youtube Video Link:</label>
                <input type="text" class="form-control" name="extra_section_6_video_link"
                  id="extra_section_6_video_link" value="{{ old('extra_section_6_video_link') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_6_caption">Caption:</label>
                <input type="text" class="form-control" name="extra_section_6_caption" id="extra_section_6_caption"
                  value="{{ old('extra_section_6_caption') }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="extra_section_6_image">Image:</label>
                <input type="file" name="extra_section_6_image" class="form-control">
              </div>
            </div>
          </div>
      </div>
    </div>


    <div class="row margin-vertical">
      <div class="col-md-6">
        <label for="region_graphic">Region Graphic:</label>
        <input type="file" name="region_graphic" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="region_graphic_mobile">Region Graphic (Mobile):</label>
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
              value="{{ old('benef1_caption_title') }}" />
          </div>
          <div class="form-group">
            <label for="benef1_caption">Caption 1 Text:</label>
            <input type="text" class="form-control" name="benef1_caption" id="benef1_caption"
              value="{{ old('benef1_caption') }}" />
          </div>
          <div class="form-group">
            <input type="file" name="benef1_figure" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="benef2_caption_title">Caption 2 Title:</label>
            <input type="text" class="form-control" name="benef2_caption_title" id="benef2_caption_title"
              value="{{ old('benef2_caption_title') }}" />
          </div>
          <div class="form-group">
            <label for="benef2_caption">Caption 2 Text:</label>
            <input type="text" class="form-control" name="benef2_caption" id="benef2_caption"
              value="{{ old('benef2_caption') }}" />
          </div>
          <div class="form-group">
            <input type="file" name="benef2_figure" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="benef3_caption_title">Caption 3 Title:</label>
            <input type="text" class="form-control" name="benef3_caption_title" id="benef3_caption_title"
              value="{{ old('benef3_caption_title') }}" />
          </div>
          <div class="form-group">
            <label for="benef3_caption">Caption 3 Text:</label>
            <input type="text" class="form-control" name="benef3_caption" id="benef3_caption"
              value="{{ old('benef3_caption') }}" />
          </div>
          <div class="form-group">
            <input type="file" name="benef3_figure" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="benef4_caption_title">Caption 4 Title:</label>
            <input type="text" class="form-control" name="benef4_caption_title" id="benef4_caption_title"
              value="{{ old('benef4_caption_title') }}" />
          </div>
          <div class="form-group">
            <label for="benef4_caption">Caption 4 Text:</label>
            <input type="text" class="form-control" name="benef4_caption" id="benef4_caption"
              value="{{ old('benef4_caption') }}" />
          </div>
          <div class="form-group">
            <input type="file" name="benef4_figure" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="benef5_caption_title">Caption 5 Title:</label>
            <input type="text" class="form-control" name="benef5_caption_title" id="benef5_caption_title"
              value="{{ old('benef5_caption_title') }}" />
          </div>
          <div class="form-group">
            <label for="benef5_caption">Caption 5 Text:</label>
            <input type="text" class="form-control" name="benef5_caption" id="benef5_caption"
              value="{{ old('benef5_caption') }}" />
          </div>
          <div class="form-group">
            <input type="file" name="benef5_figure" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="benef6_caption_title">Caption 6 Title:</label>
            <input type="text" class="form-control" name="benef6_caption_title" id="benef6_caption_title"
              value="{{ old('benef6_caption_title') }}" />
          </div>
          <div class="form-group">
            <label for="benef6_caption">Caption 6 Text:</label>
            <input type="text" class="form-control" name="benef6_caption" id="benef6_caption"
              value="{{ old('benef6_caption') }}" />
          </div>
          <div class="form-group">
            <input type="file" name="benef6_figure" class="form-control">
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="spacing-small"></div>

  <button type="submit" class="btn btn-primary">Save</button>
  <a class="btn btn-primary" href="{{ route('landing-pages.index') }}">Cancel</a>
  </form>
</div>
</div>
</div>
@endsection