@extends('admin::layouts.master')
@section('content')
@include('admin::partials.sidebar');
   <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $page_title }}</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Item</li>
                        <li class="breadcrumb-item active">{{ $page_title }}</li>
                    </ul>
                    <!-- <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <!-- <h2>Basic Validation</h2> -->
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{ url('admin/update-subcategory')}}" enctype="multipart/form-data" >
                             @csrf
                                <input type="hidden" name="subcategory_id" value="{{ $subcategory->id }}">
                                
                                
                                
                                  <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">--select--</option>
                                        @if(count($category))
                                        @foreach($category as $cat)
                                        <option value="{{$cat->id}}" {{ $subcategory->category_id == $cat->id ? "selected":''}}>{{ $cat->category_name }}</option>
                                        @endforeach
                                        @endif
                                   </select> 
                                     @if($errors->has('category'))
                                    <p class="text-danger">*{{ $errors->first('category')}}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" class="form-control" name="item" autocomplete="off" value="{{ $subcategory->subcategory_name}}">
                                     @if($errors->has('item'))
                                    <p class="text-danger">*{{ $errors->first('item')}}</p>
                                    @endif
                                </div>

                                
                                
                                        <?php
                                            $arr = [];
                                                 if(!empty($subcategory->subcategory_pack)){
                                                 foreach ($subcategory->subcategory_pack as $key => $value) {
                                                     $arr[] = $value->pack_id;
                            
                                                 }
                            
                                             }
                                           ?>

                                  <div class="form-group">
                                    <label>Packs</label>
                                    <select class="form-control" name="pack[]" multiple="">


                                <!--<option value="">--select--</option>-->
                                @if(count($pack))
                                @foreach($pack as $pk)
                                <option value="{{$pk->id}}" {{ in_array($pk->id,$arr) ? "selected":""}}>{{ $pk->pack_name }}</option>
                                @endforeach
                                @endif

                                   </select> 
                                     @if($errors->has('pack'))
                                    <p class="text-danger">*{{ $errors->first('pack')}}</p>
                                    @endif
                                </div>


                                 <div class="form-group">
                                    <label>Duration(months)</label>
                                    <input type="number" class="form-control" name="duration" autocomplete="off" value="{{ $subcategory->duration }}" oninput="this.value = Math.round(this.value);">
                                     @if($errors->has('duration'))
                                    <p class="text-danger">*{{ $errors->first('duration')}}</p>
                                    @endif
                                </div>


                                 <div class="form-group">
                                    <label>ROI(%)</label>
                                    <input type="number" class="form-control" name="roi" value="{{ $subcategory->roi }}">
                                     @if($errors->has('roi'))
                                    <p class="text-danger">*{{ $errors->first('roi')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg" />
                                     @if($errors->has('image'))
                                    <p class="text-danger">*{{ $errors->first('image')}}</p>
                                    @endif

                                     <input type="hidden" class="form-control" name="existingImage" value="{{ $subcategory->image}}" />
                                </div>

                                 <div class="form-group">
                                    <img src="{{ url('public/assets/images/phreshfarm_img/'.$subcategory->image)}}" height="180" width="250">
                                </div>


                                   <div class="form-group">
                                    <label>Description</label>
                                     <textarea class="form-control" name="description">{!! $subcategory->description  !!}</textarea>
                                     @if($errors->has('description'))
                                    <p class="text-danger">*{{ $errors->first('description')}}</p>
                                    @endif
                                </div>
                               


                               
                               
                                
                                
                               
                                <br>
                                <button type="submit" class="btn btn-primary">Add Item</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>



@endsection
