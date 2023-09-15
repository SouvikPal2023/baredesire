<div class="mb-3">
  <label class="form-label" for="FaqQuestion">Question<span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

   <input type="text" 
           name="question" 
           class="form-control @error('question') is-invalid @enderror"
           id="FaqQuestion" 
           placeholder="Enter Question" 
           value="{{old('question', isset($faq->question) ? $faq->question:'')}}" 
           required />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Answer">Answer <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">
    
    <textarea class="nicEdit form-control @error('answer') is-invalid @enderror" rows="4" name="answer" id="Answer" placeholder="Enter Answer">{{old('answer', isset($faq->answer) ? $faq->answer:'')}}</textarea>
  </div>
</div>


<button type="submit" class="btn btn-primary">{{isset($faq) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('faq.index') }}">Cancel</a>




@include('admin.common.scripts')




