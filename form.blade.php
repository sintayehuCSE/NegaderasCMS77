@csrf
<div>
    <div class="content">
		<div col lg-8>
        <div class="container-fluid">
			<input type="hidden" value="" id="id" name="id">
            <div class="form-group">
				<select name="type" class="form-control custom-select"
				 style="width: 50%;" id="type"
				 value="">
					<option selected disabled>Select room type</option>
					<option>Single Room</option>
					<option>Double Room</option>
					<option>Guest Room</option>
				</select>
			</div>
		</div>	
		<div>
        @error('type')
            <span class="error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    	</div>
    </div>  

    <div class="content">
        <div class="container-fluid">
			<div class="form-group">
				<input type="text" placeholder="Room No" name="no" 
					class="form-control select2 select2-hidden-accessible"
					style="width: 50%;" aria-hidden="true" id="no"
					>
            </div>
		</div>
	    <div>
			@error('no')
				<span class="error" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
      	</div>
	</div>  
		
	<div class="content">
		<div class="container-fluid">
			<div class="form-group">
				<label>Description</label>
				<textarea rows="4" cols="5" name="description" 
				class="form-control select2 select2-hidden-accessible"
					style="width: 50%;"  aria-hidden="true" id="description"
					>
				</textarea>
			</div>
		</div>
		<div>
			@error('description')
				<span class="error" role="alert">
					<strong>{{ $message }}</strong>
                </span>
          	@enderror
      	</div>
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="form-group">
                <input type="text" placeholder="Price" name="price" 
				class="form-control select2 select2-hidden-accessible"
					style="width: 50%;" aria-hidden="true" id="price"
					>
			</div>
		</div>
		<div>
			@error('description')
				<span class="error" role="alert">
					<strong>{{ $message }}</strong>
                </span>
          	@enderror
      	</div>
	</div>

	<div class="content">
        <div class="container-fluid">
            <div class="form-group">
				<select name="status" class="form-control custom-select"
				style="width: 50%;" id="status"
				>
					<option selected disabled>Select status</option>
					<option>Active</option>
					<option>Inactive</option>
				</select>
			</div>
		</div>	
		<div>
        @error('type')
            <span class="error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    	</div>
    </div> 
	</div>

	
    