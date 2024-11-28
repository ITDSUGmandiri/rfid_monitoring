<div class="col-md-12">
<?= 
form_open(ADMIN_NAMESPACE_URL . '/widgeds/save_widged_chart', [
    'class' => 'form-horizontal',
    'id' => 'formSetupWidgedChart',
    'medhod' => 'POST'
    ]);

?>
          <input type="hidden" name="widged_type" id="widged_type" value="chart">
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="widged" id="widged" value="chart">
         
          <div class="form-group ">
              <label for="name" class="col-sm-2 control-label"><?= cclang('title') ?> <i class="required">*</i></label>

              <div class="col-sm-9">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="">
              </div>
          </div>
        
    
          <hr>

          <div class="form-group ">
              <label for="suffix" class="col-sm-2 control-label "><?= cclang('series') ?></label>

              <div class="series-item-wrapper col-md-10">
	            <div class="series-item">
	                <div class="col-sm-6">
	                 <a href="" class="btn btn-default btn-series-detail btn-block">Series 1</a>
	                </div>
	                <div class="col-sm-1">
	                 <a href="" class="btn btn-danger"><span class="fa fa-trash"></span></a>
	                </div>
	            </div>
              </div>



              <div class="col-md-10 col-md-offset-2">
              <a class="fa btn fa-plus-circle btn-add-series btn-default">
              </a>
            </div>
                
          </div>


          <hr>
         
          
        </p>
      </div>
	
        <div class="col-md-9 col-md-offset-2">
        <span class="loading loading-hide"><img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> <i><?= cclang('loading_getting_data') ?></i></span>
        <a class="btn text-danger pull-right  btn-delete-widged" data-dismiss="modal"><?= cclang('delete_widged') ?></a>
        <button type="submit" id="btnCreateProject" class="btn pull-right   btn-primary btn-flat"><?= cclang('save_change') ?></button>
    </div>


      </form>

</div>