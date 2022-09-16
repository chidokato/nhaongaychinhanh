<section class="main-search">
	<div class="container container-header">
		<form action="search-product" method="POST" class="widget-search" ><input type="hidden" name="_token" value="{{csrf_token()}}" />
			<div class="flex">
				<div class="flex mr-3 search-text">
		            <input name="key" type="text" class="" placeholder="Nhập từ khóa tìm kiếm...">
		        </div>

		        <div class="mr-3 search-cat">
                    <ul class="nav nav-tabs flex">
                        @foreach($category_parent as $key => $val)
                        <li class="nav-item">
                            <a class="nav-link {{ $val->id == $category->id || $val->id == $category->parent? 'active':'' }}" href="{{$val->slug}}">{{$val->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mr-3">
		            <select name="category_search_id" class="select2" id="loainhadat">
		                <option value="">Chọn danh mục</option>
		                @foreach($category_search as $val)
		                @if($val->parent == $category->id || $val->parent == $category->parent)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                        @endif
                        @endforeach
		            </select>
		        </div>

		        <div class="mr-3">
		            <select name="province_search_id" class="form-control tinhthanh" id="province">
		            	<option value="">Tỉnh thành</option>
		                @foreach($province_search as $val)
		                <option <?php if(isset($province_search_id) && $province_search_id == $val->id){echo "selected";} ?> value="{{$val->id}}">{{$val->name}}</option>
		                @endforeach
		            </select>
		        </div>

		        <div class="mr-3">
		            <select name="district_search_id" class="form-control quanhuyen" id="district">
		                <option value="">Quận / Huyện</option>
		                @if(isset($province_search_id))
		                <?php $district = district::where('province_id', $province_search_id)->get(); ?>
		                @foreach($district as $val)
		                <option {{ $district_search_id==$val->id? 'selected':'' }} value="{{$val->id}}">{{$val->name}}</option>
		                @endforeach
		                @endif
		            </select>
		        </div>
		        <div class="mr-3">
		            <select name="ward_search_id" class="form-control phuongxa" id="ward">
		                <option value="">Phường / xã</option>
		                @if(isset($district_search_id))
		                <?php $ward = ward::where('district_id', $district_search_id)->get(); ?>
		                @foreach($ward as $val)
		                <option {{ $ward_search_id==$val->id? 'selected':'' }} value="{{$val->id}}">{{$val->name}}</option>
		                @endforeach
		                @endif
		            </select>
		        </div>
		        <div class="">
		            <select name="street_search_id" class="form-control duong" id="street">
		                <option value="">Đường</option>
		                @if(isset($district_search_id))
		                <?php $street = street::where('district_id', $district_search_id)->get(); ?>
		                @foreach($street as $val)
		                <option {{ $street_search_id==$val->id? 'selected':'' }} value="{{$val->id}}">{{$val->name}}</option>
		                @endforeach
		                @endif
		            </select>
		        </div>
		        <div class="locthem ml-3">
		            <a href="#" > Lọc thêm </a>
		        </div>
				<div class="flex ml-3 search-text">
		            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
		        </div>
				
			</div>
		</form>
	</div>
</section>