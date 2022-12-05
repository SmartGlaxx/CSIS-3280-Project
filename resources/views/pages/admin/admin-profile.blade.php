@extends('partials/pageHeader')
@if(!session("adminUserName"))
    <div>Account not found</div>
@endif
@section("innerContent")
    <div class="container subPage">
        <div class="container">
        <div class="row ">
            <div class="col-sm-12 col-md-3 movie-card">
                <h2>Services</h2>
                <div>14</div> 
            </div>
            <div class="col-sm-12 col-md-3 movie-card">
                <h2>Quotes</h2>
                <div>23</div> 
            </div>
            <div class="col-sm-12 col-md-3 movie-card">
                <h2>Tickets</h2>
                <div>66</div> 
            </div>
            <div class="col-sm-12 col-md-3 movie-card">
                <h2>invoices</h2>
                <div>35</div> 
            </div>
        </div><br/>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="col-sm-12 col-md-12 movie-card">
                    <h5>Invoices</h5>
                    <div>34</div>
                </div>
                <div class="col-sm-12 col-md-12 graph">
                    <h5 >Tasks completed:</h5>
                    <ol>
                        <li>Inventory restock</li>
                        <li>Sales analysis</li>
                        <li>Meeting with management</li>
                        <li>Box-office trend listing</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-12 col-md-1 empty-div"></div>
            <div class="col-sm-12 col-md-6 graph ">
                <h5>My week</h5>
                 <div class="progress">
                    <div class="progress-label">Print advertorials</div><div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-label">Schedule movies</div><div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-label">Create 5 new playlists</div><div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-label">Settle invoices</div><div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-label">Conduct interviews</div><div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </div>
        </div>
        <div class="row circle-chat-container graph ">
            <h5>Sector determinants</h5>
            <div class="col-sm-12 col-md-6 circle-chat-box">
                <div class="circle-chat" >
                    <div>Cinema industry</div>
                </div>
                <div class="chat-divider">  <div> Market share</div></div>
            </div>
            <div class="col-sm-12 col-md-6">
                <h5>Scheduler</h5>
                <div>
                    <div class="accordion" id="accordionExample" >
                        <div class="accordion-item" >
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Week 1
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>For next week</strong>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                sodales urna orci, id pellentesque nulla mattis eu. Integer sit 
                                amet fermentum nibh. Nulla gravida sodales quam vel auctor. 
                                Praesent semper quis dui
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              The week after
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                sodales urna orci, id pellentesque nulla mattis eu. Integer sit 
                                amet fermentum nibh. Nulla gravida sodales quam vel auctor. 
                                Praesent semper quis dui
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              The week after next
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                sodales urna orci, id pellentesque nulla mattis eu. Integer sit 
                                amet fermentum nibh. Nulla gravida sodales quam vel auctor. 
                                Praesent semper quis dui
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@include("partials/footer")