@extends('admin.layouts.default')
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
        <form action="{{route('Enquiry.update',$enquiry->id)}}" class="form" method="post">
            @csrf
            <div class="form-group">
                <label>Is Customer:</label>
                <input @if($enquiry->is_customer=='Yes') checked @endif type="checkbox" name="is_customer" id="is_customer" value="yes"
                />
            </div>
            <div class="form-group d-none" id="customer">
                <label>Enquiry Name :</label>
                <select name="customer_id" class="form-control form-control-solid customer">
                    <option disabled selected>--select any one--</option>
                    @foreach($customer as $customer)
                        <option @if($enquiry->customer_id==$customer->id) selected @endif value="{{$customer->id}}">{{$customer->fname}} {{$customer->lname}}</option>
                    @endforeach
                </select>
            </div>
            <div id="notcustomer">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="name" class="form-control form-control-solid notcustomer" placeholder="Enter full name"
                           name="name" value="{{$enquiry->name}}"
                    />
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control form-control-solid notcustomer" placeholder="Enter email"
                           name="email" value="{{$enquiry->email}}"
                    />
                </div>
                <div class="form-group">
                    <label>Contact Number:</label>
                    <input type="number" class="form-control form-control-solid notcustomer"
                           placeholder="Enter contact number" name="phone" value="{{$enquiry->phone}}"
                    />
                </div>
            </div>
            <div class="form-group">
                <label>Enquiry Category:</label>
                <select name="category_id" id="" class="form-control form-control-solid" required>
                    <option selected disabled>--Select any one--</option>
                    @foreach($category as $category)
                        <option @if($enquiry->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">The enquiry category field is required</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Enquiry Source:</label>
                <select name="source_id" id="" class="form-control form-control-solid" required>
                    <option selected disabled>--Select any one--</option>
                    @foreach($source as $source)
                        <option @if($enquiry->source_id==$source->id) selected @endif value="{{$source->id}}">{{$source->name}}</option>
                    @endforeach
                </select>
                @error('source_id')
                <div class="text-danger">The enquiry source field is required</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Date:</label>
                <input type="date" class="form-control form-control-solid" placeholder="Enter full name" name="date"
                       value="{{$enquiry->date}}"
                />
                @error('date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>time:</label>
                <input type="time" class="form-control form-control-solid" placeholder="Enter full name" name="time"
                       value="{{$enquiry->time}}"
                />
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
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
@endsection
