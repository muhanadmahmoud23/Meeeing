<script>
$(document).on('click', '.add', function() {

$("#appendanalysis").prepend(`
    <div class="container  lign-items-center">
        <div class="col-md-10" >
            <div class="form-group">

                <select class="form-control form-control-lg form-control-solid "  name="type[]" id="type" required >
                    <option>Select Type</option>
                        @for($i=0;$i<count($type);$i++)
                    <option value="{{$type[$i]->id}}">{{ $type[$i]->type }}</option>
                        @endfor
                </select>

                <select class="form-control form-control-lg form-control-solid"  name="country[]" id="country" required >
                    <option>Select Country</option>
                        @for($i=0;$i<count($country);$i++)
                    <option value="{{$country[$i]->id}}">{{ $country[$i]->country }}</option>
                        @endfor
                </select>

            </div>
                
            <div class="col-md-1 mb-5">
                <button onclick="style.display = 'none'; document.getElementById('dele').style.display = 'block';" class="btn btn-success text-center add" type="button">{{ __('Add') }} </button>
            </div>
            <div class="col-md-1  mt-5">
        </div>  
    </div>`
);
       
});
</script>