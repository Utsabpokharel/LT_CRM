@extends('Admin.Layout.master')
@section('page_title','Edit enquiry')

@section('script')
<script>
    $('#is_customer').change(function () {
            var is_checked = $('#is_customer').prop('checked');
            if (is_checked) {
                $('#notcustomer').addClass('d-none');
                $('#customer').removeClass('d-none');
                $('.notcustomer').each(function () {
                    $(this).val('');
                });
            } else {
                $('#customer').addClass('d-none');
                $('#notcustomer').removeClass('d-none');

            }
        });
</script>
@endsection

@section('content')
<div class="card-body card">
    <form action="{{route('enquiry.update',$enquiry->id)}}" class="form" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        @if($enquiry->is_customer=='Yes')
        <div class="form-group">
            <label>Is Customer:</label>
            <input @if($enquiry->is_customer=='Yes') checked @endif type="checkbox" name="is_customer" id="is_customer"
            value="yes"
            />
        </div>
        <div class="form-group" id="customer">
            <label>Enquired By :</label>
            <select name="customer_id" class="form-control form-control-solid customer">
                <option disabled selected>--select any one--</option>
                @foreach($customer as $customer)
                <option @if($enquiry->customer_id==$customer->id) selected @endif
                    value="{{$customer->id}}">{{$customer->firstname}} {{$customer->lastname}}</option>
                @endforeach
            </select>
        </div>
        @else
        <div id="notcustomer">
            <div class="form-group">
                <label>Is Customer:</label>
                <input type="hidden" name="is_customer" id="is_customer" value="no" />
            </div>
            <div class="form-group">
                <label>Enquired By:</label>
                <input type="name" class="form-control form-control-solid notcustomer" placeholder="Enter full name"
                    name="name" value="{{$enquiry->name}}" />
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control form-control-solid notcustomer" placeholder="Enter email"
                    name="email" value="{{$enquiry->email}}" />
            </div>
            <div class="form-group">
                <label>Contact Number:</label>
                <input type="number" class="form-control form-control-solid notcustomer"
                    placeholder="Enter contact number" name="phone" value="{{$enquiry->phone}}" />
            </div>
        </div>
        @endif
        <div class="form-group">
            <label>Enquiry Category:</label>
            <select name="category_id" id="" class="form-control form-control-solid" required>
                <option selected value="{{$enquiry->category_id}}">{{$enquiry->category->categoryname}}
                </option>
                <option class="bg-info" disabled>--Select any one--</option>
                @foreach($category as $category)
                <option @if(old('category_id')==$category->id) @endif
                    value="{{$category->id}}">{{$category->categoryname}}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">The enquiry category field is required</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Enquiry Source:</label>
            <select name="source_id" id="" class="form-control form-control-solid" required>
                <option selected value="{{$enquiry->source_id}}">{{$enquiry->source->source}}
                </option>
                <option class="bg-info" disabled>--Select any one--</option>
                @foreach($source as $source)
                <option @if(old('source_id')==$source->id) selected @endif
                    value="{{$source->id}}">{{$source->source}}
                </option>
                @endforeach
            </select>
            @error('source_id')
            <div class="text-danger">The enquiry source field is required</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Date:</label>
            <input type="date" class="form-control form-control-solid" name="date" value="{{$enquiry->date}}" />
            @error('date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>time:</label>
            <input type="time" class="form-control form-control-solid" name="time" value="{{$enquiry->time}}" />
            @error('time')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Remarks:</label>
            <textarea class="form-control form-control-solid" name="remarks" cols="30"
                rows="10">{{$enquiry->remarks}}</textarea>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Update</button>
            <a class="btn btn-secondary" href="{{route('enquiry.index')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection
