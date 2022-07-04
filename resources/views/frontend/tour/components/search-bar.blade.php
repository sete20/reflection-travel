<div class="col-12 col-lg-4">

    <aside class="sidebar-wrapper pv">

        <div class="secondary-search-box mb-30">

            <h4 class="">Search</h4>

            <form>

                <div class="row">

                    <div class="col-12">
                        <div class="col-inner">
                            <div class="form-group">
                                <label>Tour Type</label>
                                <select class="chosen-the-basic form-control form-control-sm" placeholder="Select one" tabindex="2">
                                    <option></option>
                                    <option>All</option>
                                    <option>Adventure</option>
                                    <option>City tour</option>
                                    <option>Honeymoon</option>
                                    <option>Cultural</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="col-inner">
                            <div class="form-group">
                                <label>Destination</label>
                                <select class="chosen-the-basic form-control form-control-sm" placeholder="Select two" tabindex="2">
                                    <option></option>
                                    <option>All</option>
                                    <option>Asia</option>
                                    <option>Europe</option>
                                    <option>Africa</option>
                                    <option>America</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="col-inner">
                            <div class="form-group">
                                <label>When</label>
                                <input type="text" class="form-control form-readonly-control air-datepicker" placeholder="Pick a month" data-min-view="months" data-view="months" data-date-format="MM yyyy" data-language="en" data-auto-close="true" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="col-inner ph-20 pv-15">
                            <a href="#" class="btn btn-primary btn-block"><i class="ion-android-search"></i> search</a>
                        </div>
                    </div>

                </div>

            </form>

        </div>

        <div class="sidebar-box">

            <div class="box-title"><h5>Price Range</h5></div>

            <div class="box-content">
                <input id="price_range" />
            </div>

        </div>

        <div class="sidebar-box">

            <div class="box-title"><h5>Star Slider</h5></div>

            <div class="box-content">
                <input id="star_range" />
            </div>

        </div>

        <div class="sidebar-box">

            <div class="box-title"><h5>Starting Point</h5></div>

            <div class="box-content">

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerStartPoint-01" name="filerStartPoint" checked>
                    <label class="custom-control-label" for="filerStartPoint-01">Berlin <span class="text-muted font-sm">(854)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerStartPoint-02" name="filerStartPoint" >
                    <label class="custom-control-label" for="filerStartPoint-02">Paris <span class="checkbox-count">(25)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerStartPoint-03" name="filerStartPoint" >
                    <label class="custom-control-label" for="filerStartPoint-03">Munich <span class="checkbox-count">(254)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerStartPoint-04" name="filerStartPoint" >
                    <label class="custom-control-label" for="filerStartPoint-04">Lyon<span class="checkbox-count">(22)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerStartPoint-05" name="filerStartPoint" >
                    <label class="custom-control-label" for="filerStartPoint-05">Vienna  <span class="checkbox-count">(9)</span></label>
                </div>

                <div id="filerStartPointShowHide" class="collapse">

                    <div class="collapse-inner">

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filerStartPoint-06" name="filerStartPoint" >
                            <label class="custom-control-label" for="filerStartPoint-06">Toulouse <span class="checkbox-count">(3)</span></label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filerStartPoint-06" name="filerStartPoint" />
                            <label class="custom-control-label" for="filerStartPoint-06">Graz <span class="checkbox-count">(25)</span></label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filerStartPoint-07" name="filerStartPoint" />
                            <label class="custom-control-label" for="filerStartPoint-07">Linz  <span class="checkbox-count">(2)</span></label>
                        </div>

                    </div>

                </div>

                <div class="clear mb-10"></div>

                <button class="btn btn-toggle btn-text-inherit text-primary text-uppercase font10 letter-spacing-2 font600 collapsed collapsed-on padding-0" type="buttom" data-toggle="collapse" data-target="#filerStartPointShowHide">Show more (+)</button>
                <button class="btn btn-toggle btn-text-inherit text-uppercase font10 letter-spacing-2 font600 collapsed collapsed-off padding-0" type="buttom" data-toggle="collapse" data-target="#filerStartPointShowHide">Show less (-)</button>

            </div>

        </div>

        <div class="sidebar-box">

            <div class="box-title"><h5>Endong Point</h5></div>

            <div class="box-content">

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerEndPoint-01" name="filerEndPoint" checked>
                    <label class="custom-control-label" for="filerEndPoint-01">Berlin <span class="text-muted font-sm">(854)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerEndPoint-02" name="filerEndPoint" >
                    <label class="custom-control-label" for="filerEndPoint-02">Paris <span class="checkbox-count">(25)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerEndPoint-03" name="filerEndPoint" >
                    <label class="custom-control-label" for="filerEndPoint-03">Munich <span class="checkbox-count">(254)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerEndPoint-04" name="filerEndPoint" >
                    <label class="custom-control-label" for="filerEndPoint-04">Lyon<span class="checkbox-count">(22)</span></label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="filerEndPoint-05" name="filerEndPoint" >
                    <label class="custom-control-label" for="filerEndPoint-05">Vienna  <span class="checkbox-count">(9)</span></label>
                </div>

                <div id="filerStartPointShowHide" class="collapse">

                    <div class="collapse-inner">

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filerEndPoint-06" name="filerEndPoint" />
                            <label class="custom-control-label" for="filerEndPoint-06">Toulouse <span class="checkbox-count">(3)</span></label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filerEndPoint-07" name="filerEndPoint" />
                            <label class="custom-control-label" for="filerEndPoint-07">Graz <span class="checkbox-count">(25)</span></label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="filerEndPoint-08" name="filerEndPoint" />
                            <label class="custom-control-label" for="filerEndPoint-08">Linz <span class="checkbox-count">(2)</span></label>
                        </div>

                    </div>

                </div>

                <div class="clear mb-10"></div>

                <button class="btn btn-toggle btn-text-inherit text-primary text-uppercase font10 letter-spacing-2 font600 collapsed collapsed-on padding-0" type="buttom" data-toggle="collapse" data-target="#filerStartPointShowHide">Show more (+)</button>
                <button class="btn btn-toggle btn-text-inherit text-uppercase font10 letter-spacing-2 font600 collapsed collapsed-off padding-0" type="buttom" data-toggle="collapse" data-target="#filerStartPointShowHide">Show less (-)</button>

            </div>

        </div>

        <div class="sidebar-box">

            <div class="box-title"><h5>Filter Select</h5></div>

            <div class="box-content">
                <div class="form-group">
                    <select data-placeholder="Filter Select"  class="chosen-the-basic form-control" tabindex="2">
                        <option value=""></option>
                        <option value="filter-select-0">Filter Select One</option>
                        <option value="filter-select-1">Filter Select Two</option>
                        <option value="filter-select-2">Filter Select Three</option>
                        <option value="filter-select-3">Filter Select Four</option>
                        <option value="filter-select-4">Filter Select Five</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="sidebar-box">

            <div class="box-title"><h5>Filter Text</h5></div>

            <div class="box-content">
                <p>Park fat she nor does play deal our. Procured sex material his offering humanity laughing moderate can. Unreserved had she nay dissimilar admiration interested.</p>
            </div>

        </div>

    </aside>

</div>
