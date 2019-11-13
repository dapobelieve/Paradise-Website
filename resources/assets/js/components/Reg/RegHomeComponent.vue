<template>
  <div class="store-home">
      <div class="main col-md-12">
                <h3 class="page-title text-center"><strong>Funaab Registrations</strong></h3>
                <div class="separator"></div>
                <div class="tab-content clear-style">
                    <div class="tab-pane active">                       
                        <div class="row" style="height: auto">
                          <div class="col-sm-6 col-md-4">
                            <div class="image-box style-2 mb-20 bordered text-center">
                              <div class="body shadow ">
                                <h3>Part Time Programme</h3>
                                <div class="separator"></div>
                                <p class="desc">Begin Part Time Programme Registration.</p>
                                <router-link class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear" :to="{name: 'part-time'}">Start Now<i class="fa fa-arrow-right pl-10"></i></router-link>
                                <a ></a>                       
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4">
                            <div class="image-box style-2 mb-20 bordered text-center">
                              <div class="body shadow ">
                                <h3>Post Graduate Programme</h3>
                                <div class="separator"></div>
                                <p class="desc">Begin Post Graduate Programme Registration.</p>
                                <router-link class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear" :to="{name: 'post-graduate'}">Start Now<i class="fa fa-arrow-right pl-10"></i></router-link>                       
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4">
                            <div class="image-box style-2 mb-20 bordered text-center">
                              <div class="body shadow ">
                                <h3>Pre Degree Programme</h3>
                                <div class="separator"></div>
                                <p class="desc">Begin Pre Degree Programme Registration.</p>
                                  <router-link class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear" :to="{name: 'pre-degree'}">Start Now<i class="fa fa-arrow-right pl-10"></i></router-link>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
  </div>
</template>
<script>
export default {

}
</script>
<style>
.desc {
  color: black;
  font-weight: bolder;
}
</style>