<div id="hoeapp-container" hoe-color-type="lpanel-bg5" hoe-lpanel-effect="shrink">
                <aside id="hoe-left-panel" hoe-position-type="absolute">

                    <ul class="nav panel-list">
                        <li class="<?= $menu == 0 ? 'active':'' ?>">
                            <a href="<?= base_url() ?>">
                                <i class="fa fa-home"></i>
                                <span class="menu-text">Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <?php if($this->session->userdata('jabatan') == NULL || $this->session->userdata('jabatan')[0]['id_level'] == 12 ){?>
                        <li class="hoe-has-menu <?= $menu == 1 ? 'active':'' ?>">
                            <a href="javascript:void(0)">
                                <i class="ion-ios-filing-outline"></i>
                                <span class="menu-text">Data Master</span>
                                <span class="selected"></span>
                            </a>
                            <ul class="hoe-sub-menu">
                                <li class="hoe-has-menu <?= $menu == 1 ? 'active':'' ?>">
                                    <a href="javascript:void(0)">
                                        <span class="menu-text">Perusahaan</span>
                                        <span class="selected"></span>
                                    </a>
                                    <?php if($this->session->userdata('jabatan') == NULL) {?>
                                    <ul class="hoe-sub-menu">
                                        <li class="<?= $sub_menu == "jabatan" ? 'active':'' ?>">
                                            <a href="<?= base_url() ?>perusahaan/jabatan/jabatan">
                                                <span class="menu-text">Position</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                        <li class="<?= $sub_menu == "admin" ? 'active':'' ?>">
                                            <a href="<?= base_url() ?>perusahaan/admin">
                                                <span class="menu-text">Admin Departement</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <?php }else{?>
                                    <ul class="hoe-sub-menu">
                                        <li class="<?= $sub_menu == "jabatan" ? 'active':'' ?>">
                                            <a href="<?= base_url() ?>perusahaan/user">
                                                <span class="menu-text">Daftar Karyawan</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <?php }?>
                                </li>  
                                <?php if($this->session->userdata('jabatan') == NULL) {?>
                                <li class="hoe-has-menu <?= $menu == 1 ? 'active':'' ?>">
                                    <a href="javascript:void(0)">
                                        <span class="menu-text">Key Performance Indicator</span>
                                        <span class="selected"></span>
                                    </a>
                                    <ul class="hoe-sub-menu">
                                        <li class="<?= $sub_menu == "sanksi" ? 'active':'' ?>">
                                            <a href="<?= base_url() ?>kpi/sanksi">
                                                <span class="menu-text">Penalty</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <?php }?>
                                </li>  
                            </ul>
                        </li>
                        <?php }?>
                        <?php if($this->session->userdata('jabatan') != NULL) {?>
                        <li class="hoe-has-menu <?= $menu == 2 ? 'active':'' ?>">
                            <a href="javascript:void(0)">
                                <i class="fa fa-table"></i>
                                <span class="menu-text">Key Performance Indicator</span>
                                <span class="selected"></span>
                            </a>
                            <ul class="hoe-sub-menu">
                                <li class="<?= $sub_menu == "corporate" ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>kpi/corporate">
                                        <span class="menu-text">Corporate</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="<?= $sub_menu == "individu" ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>kpi/individu">
                                        <span class="menu-text">Scorring KPI</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="<?= $sub_menu == "history" ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>kpi/history">
                                        <span class="menu-text">history</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </aside><!--aside left menu end-->

