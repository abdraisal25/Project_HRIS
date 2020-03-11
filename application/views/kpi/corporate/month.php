<?php
                                                        $no = 1;
                                                        foreach($data as $n){
                                                    ?>
                                                    <tr style="text-align:center">
                                                        <td><?= $no ?></td> 
                                                        <td><?= $n{'kategori_nama'}?></td>
                                                        <td><?= $n{'corporate_nama'}?></td>
                                                        <td><?= $n{'corporate_target'}?></td>
                                                        <td><?= $n{'corporate_bobot'}?></td>
                                                        <td><?= $n{'corporate_tercapai'} ?></td>
                                                        <td>
                                                            <!-- <div class="ui-buttons" style="text-align:center" >       
                                                                    <button class="btn btn-primary btn-circle btn-icon" data-corporate="<?= $n{'key_corporate'} ?>" data-menu="view" data-target="#modal" data-toggle="modal" title="View Detail"><i class="fa fa-eye"></i></button>
                                                                <?php if($level == 0){ ?>
                                                                    <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-corporate="<?= $n{'key_corporate'} ?>" data-menu="delete" data-target="#modal" data-toggle="modal" title="Hapus"><i class="fa fa-trash"></i></button>
                                                                <?php } ?>
                                                            </div> -->
                                                        </td>
                                                        <td>
                                                            <!-- <a href="<?= base_url() ?>kpi/corporate/progress/<?= encrypt_url($n{'key_corporate'})?>"><button class="btn btn-default rounded btn-block">View Progress <i class="fa fa-arrow-right"></i></button></a>         -->
                                                        </td>
                                                    </tr>
                                                    <?php $no++;} ?>