<div id="hoeapp-container" hoe-color-type="lpanel-bg5" hoe-lpanel-effect="shrink">
                <aside id="hoe-left-panel" hoe-position-type="absolute">

                    <ul class="nav panel-list">
                        <li class="<?= $menu == 0 ? 'active':'' ?>">
                            <a href="<?= base_url() ?>lubangenak">
                                <i class="fa fa-home"></i>
                                <span class="menu-text">Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="hoe-has-menu <?= $menu == 1 ? 'active':'' ?>">
                            <a href="javascript:void(0)">
                                <i class="fa fa-envelope"></i>
                                <span class="menu-text">Perusahaan</span>
                                <span class="selected"></span>
                            </a>
                            <ul class="hoe-sub-menu">
                                <li class="<?= $sub_menu == 'jenis' ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>lubangenak/perusahaan/jenis">
                                        <span class="menu-text">Position</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <!-- <li class="<?= $sub_menu == 'level' ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>lubangenak/perusahaan/level/<?= encrypt_url(NULL) ?>&<?= encrypt_url(NULL) ?>">
                                        <span class="menu-text">Position</span>
                                        <span class="selected"></span>
                                    </a>
                                </li> -->
                                <!-- <li class="<?= $sub_menu == 'divisi' ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>lubangenak/perusahaan/divisi/<?= encrypt_url(NULL) ?>&<?= encrypt_url(NULL) ?>">
                                        <span class="menu-text">Divisi</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="<?= $sub_menu == 'departement' ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>lubangenak/perusahaan/departement/<?= encrypt_url(NULL) ?>&<?= encrypt_url(NULL) ?>">
                                        <span class="menu-text">Departement</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="<?= $sub_menu == 'jabatan' ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>lubangenak/perusahaan/jabatan/<?= encrypt_url(NULL) ?>&<?= encrypt_url(NULL) ?>">
                                        <span class="menu-text">Jabatan</span>
                                        <span class="selected"></span>
                                    </a>
                                </li> -->
                                <!-- <li class="hoe-has-menu <?= $menu == 1 ? 'active':'' ?>">
                                    <a href="javascript:void(0)">
                                        <span class="menu-text">Job Description</span>
                                        <span class="selected"></span>
                                    </a>
                                    <ul class="hoe-sub-menu">
                                        <li class="<?= $sub_menu == 'tujuan' ? 'active':'' ?>">
                                            <a href="<?= base_url() ?>lubangenak/perusahaan/jabatan/jobdesc/tujuan/<?= encrypt_url(NULL) ?>&<?= encrypt_url(NULL) ?>">
                                                <span class="menu-text">Tujuan</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                        <li class="<?= $sub_menu == 'umum' ? 'active':'' ?>">
                                            <a href="javascript:void(0)">
                                                <span class="menu-text">Tanggung Jawab Umum</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                        <li class="<?= $sub_menu == 'wewenang' ? 'active':'' ?>">
                                            <a href="javascript:void(0)">
                                                <span class="menu-text">Wewenang</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>  -->
                            </ul>
                        </li>
                        <li class="hoe-has-menu <?= $menu == 2 ? 'active':'' ?>">
                            <a href="javascript:void(0)">
                                <i class="fa fa-envelope"></i>
                                <span class="menu-text">Keys Perfomarce Indicator</span>
                                <span class="selected"></span>
                            </a>
                            <ul class="hoe-sub-menu">
                                <li class="<?= $sub_menu == 'kategori' ? 'active':'' ?>">
                                    <a href="<?= base_url() ?>lubangenak/kpi/kategori">
                                        <span class="menu-text">Kategori</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= $menu == 1000 ? 'active':'' ?>">
                            <a href="<?= base_url() ?>lubangenak/registrasi">
                                <i class="fa fa-building"></i>
                                <span class="menu-text">Registrasi Perusahaan</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </aside><!--aside left menu end-->

