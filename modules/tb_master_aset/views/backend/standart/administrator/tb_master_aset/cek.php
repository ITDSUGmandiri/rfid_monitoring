  <div class="mt-4">
      <div class="tab-buttons">
          <button class="tab-button active-tab-button" onclick="toggleTab(0)">History</button>
          <button class="tab-button" onclick="toggleTab(1)">Event</button>
      </div>
      <div class="tab" id="tab1">
          <table id="exampleas" class="table table-bordered table-striped dataTable">
              <thead>
                  <tr class="">

                      <th data-field="kode_tid" data-primary-key="0"> Tanggal</th>
                      <th data-field="kode_aset" data-primary-key="0"> Waktu</th>
                      <th data-field="nama_aset" data-primary-key="0"> Ruangan</th>
                      <th data-field="nama_aset" data-primary-key="0"> Keterangan</th>
                      <th data-field="id_area" data-primary-key="0"> Status</th>
                  </tr>
              </thead>
              <tbody id="tbody_tb_master_aset">
                  <?php foreach ($history as $tb_master_aset): ?>
                      <tr>


                          <td><span class="list_group-kode_tid"><?= _ent($tb_master_aset->tanggal); ?></span></td>
                          <td><span class="list_group-kode_aset"><?= _ent($tb_master_aset->waktugerak); ?></span></td>
                          <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->ruangan); ?></span></td>
                          <td><span class="list_group-nama_aset"></span></td>

                          <td><span class="list_group-id_area"><?= _ent($tb_master_aset->status_moving); ?></span></td>

                      </tr>
                  <?php endforeach; ?>
                  <!-- <?php if ($tb_master_aset_counts == 0) : ?>
                                            <tr>
                                                <td colspan="100">
                                                    Tb Master Aset data is not available
                                                </td>
                                            </tr>
                                        <?php endif; ?> -->
              </tbody>
          </table>
      </div>
      <div class="tab" id="tab2">
          <table id="exampleas" class="table table-bordered table-striped dataTable">
              <thead>
                  <tr class="">

                      <th data-field="kode_tid" data-primary-key="0"> <?= cclang('kode_tid') ?></th>
                      <th data-field="kode_aset" data-primary-key="0"> <?= cclang('kode_aset') ?></th>
                      <th data-field="nama_aset" data-primary-key="0"> <?= cclang('nama_aset') ?></th>
                      <th data-field="id_area" data-primary-key="0"> Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody id="tbody_tb_master_aset">
                  <?php foreach ($tb_master_asets as $tb_master_aset): ?>
                      <tr>


                          <td><span class="list_group-kode_tid"><?= _ent($tb_master_aset->kode_tid); ?></span></td>
                          <td><span class="list_group-kode_aset"><?= _ent($tb_master_aset->kode_aset); ?></span></td>
                          <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->nama_aset); ?></span></td>
                          <td><span class="list_group-id_area"><?= _ent($tb_master_aset->status); ?></span></td>
                          <td width="200">

                              <?php is_allowed('tb_master_aset_view', function () use ($tb_master_aset) { ?>
                                  <a href="<?= admin_site_url('/tb_master_aset/view/' . $tb_master_aset->id_aset); ?>" data-id="<?= $tb_master_aset->id_aset ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                                  <?php }) ?>
                                  <?php is_allowed('tb_master_aset_update', function () use ($tb_master_aset) { ?>
                                      <a href="<?= admin_site_url('/tb_master_aset/edit/' . $tb_master_aset->id_aset); ?>" data-id="<?= $tb_master_aset->id_aset ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                                  <?php }) ?>
                                  <?php is_allowed('tb_master_aset_delete', function () use ($tb_master_aset) { ?>
                                      <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_master_aset/delete/' . $tb_master_aset->id_aset); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                                  <?php }) ?>

                          </td>
                      </tr>
                  <?php endforeach; ?>
                  <?php if ($tb_master_aset_counts == 0) : ?>
                      <tr>
                          <td colspan="100">
                              Tb Master Aset data is not available
                          </td>
                      </tr>
                  <?php endif; ?>
              </tbody>
          </table>
      </div>

  </div>