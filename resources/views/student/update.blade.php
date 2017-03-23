                                 <a href="{{URL::to('student')}}">back</a>
                                 
                                 <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{URL::to('student/updateInfo')}}">
                                  <input type="hidden" name="id" value="{{ $students->id }}">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="fn" type="text" value="{{ $students->firstname }}"  />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="ln"  type="text" value="{{ $students->lastname }}" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Gender <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="gender" type="radio" value="1" />Male
                                              <input class="form-control" id="cname" name="gender" type="radio" value="2" />Female
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">DOB <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="dob" type="text" value="{{ $students->dob }}" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Pob <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="cemail" type="text" name="pob" value="{{ $students->pob }}" />
                                          </div>
                                      </div>
                                       <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">phone <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="phone" type="text" value="{{ $students->phone }}" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">subject name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="cemail" type="text" name="subject" value="{{ $students->subjectname }}" />
                                          </div>
                                      </div>
                                       <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">price <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="price" type="text" value="{{ $students->price }}" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">shift <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="cemail" type="text" name="shift" value="{{ $students->shift }}" />
                                          </div>
                                      </div>
                                       <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">year <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="cemail" type="text" name="year" value="{{ $students->year }}" />
                                          </div>
                                      </div>
                                       <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">lavel <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="lavel" type="text" value="{{ $students->lavel }}" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">email <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="cemail" type="email" name="email" value="{{ $students->email }}" />
                                          </div>
                                      </div>
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>