<aside class="social-sidebar sidebar-full">
    <div class="user-settings">
        <div class="arrow"></div>
        <h3 class="user-settings-title">Settings shortcuts</h3>
        <div class="user-settings-content">
            <a href="basic-user-profile.html">
                <div class="icon">
                    <i class="icon-user"></i>
                </div>
                <div class="title">My Profile</div>
                <div class="content">View your profile</div>
            </a>
            <a href="chat-inbox.html">
                <div class="icon">
                    <i class="icon-envelope"></i>
                </div>
                <div class="title">View Messages</div>
                <div class="content">You have <strong>17</strong> new messages</div>
            </a>
            <a href="facebook-timeline.html#view-pending-tasks">
                <div class="icon">
                    <i class="icon-tasks"></i>
                </div>
                <div class="title">View Tasks</div>
                <div class="content">You have <strong>8</strong> pending tasks</div>
            </a>
        </div>
        <div class="user-settings-footer">
            <a href="facebook-timeline.html#more-settings">See more settings</a>
        </div>
    </div>
    <div class="social-sidebar-content">
        <div class="scrollable">
            <div class="user">
                <img class="avatar" width="25" height="25" src="<?php echo $view['global_var']['img_url']; ?>avatar-30.png" alt="<?php echo $view['member_session']['fullname']; ?>">
                <span><?php echo $view['member_session']['fullname']; ?></span>
            </div>
            <div class="search-sidebar">
                <img src="<?php echo $view['global_var']['img_url']; ?>icons/stuttgart-icon-pack/32x32/search.png" alt="Search">
                <form class="search-sidebar-form">
                    <input type="text" class="search-query input-block-level" placeholder="Tìm kiếm">
                </form>
            </div>
            <section class="menu">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group ">
                        <div class="accordion-heading">
                            <a class="accordion-toggle " href="<?php echo base_url();?>">
                                <img src="<?php echo $view['global_var']['img_url']; ?>icons/stuttgart-icon-pack/32x32/home.png" alt="Dashboard">
                                <span>Bảng tin </span>
                            </a>
                        </div>
                    </div>
                    <div class="accordion-group ">
                        <div class="accordion-heading">
                            <a class="accordion-toggle " href="#">
                                <img src="<?php echo $view['global_var']['img_url']; ?>icons/stuttgart-icon-pack/32x32/comments.png" alt="UI Elements">
                                <span>Tin nhắn</span><span class="badge">9</span>
                            </a>
                        </div>
                    </div>
                    <div class="accordion-group ">
                        <div class="accordion-heading">
                            <a class="accordion-toggle " href="#">
                                <img src="<?php echo $view['global_var']['img_url']; ?>icons/stuttgart-icon-pack/32x32/calendar.png" alt="Calendar">
                                <span>Sự kiện </span><span class="badge">1</span>
                            </a>
                        </div>
                    </div>
                    <div class="accordion-group ">
                        <div class="accordion-heading">
                            <a class="accordion-toggle " href="#">
                                <img src="<?php echo $view['global_var']['img_url']; ?>icons/stuttgart-icon-pack/32x32/photo_album.png" alt="Calendar">
                                <span>Album ảnh </span>
                            </a>
                        </div>
                    </div>
                    <div class="accordion-group ">
                        <div class="accordion-heading">
                            <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion2" href="facebook-timeline.html#collapse-form-stuff">
                                <img src="<?php echo $view['global_var']['img_url']; ?>icons/stuttgart-icon-pack/32x32/group.png" alt="Form Stuff">
                                <span>Nhóm </span><span class="arrow"></span>
                            </a>
                        </div>
                        <ul id="collapse-form-stuff" class="accordion-body nav nav-list collapse ">
                            <li><a href="../form-stuff/elements.html">Form elements</a></li>
                            <li><a href="../form-stuff/validation.html">Form validation</a></li>
                            <li><a href="../form-stuff/wizards.html">Wizards</a></li>
                            <li><a href="../form-stuff/wysiwyg.html">WYSIWYG</a></li>
                        </ul>
                    </div>

                </div>
            </section>
        </div>
        <div class="chat-users">
            <div class="no-user">User not found</div>
            <ul class="user-list">
                <li>
                    <a data-firstname="Cesar" data-lastname="Mendoza" data-status="online" data-userid="1" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user2_22.jpg" alt="">
                        <span>Cesar Mendoza</span>
                        <i class="icon-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="2" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user1_22.jpg" alt="">
                        <span>Yadra Abels</span>
                        <i class="icon-circle user-status offline"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Tobei" data-lastname="Tsumura" data-status="online" data-userid="3" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user4_22.jpg" alt="">
                        <span>Tobei Tsumura</span>
                        <i class="icon-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="John" data-lastname="Doe" data-status="offline" data-userid="4" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user3_22.jpg" alt="">
                        <span>John Doe</span>
                        <i class="icon-circle user-status offline"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Cesar" data-lastname="Mendoza" data-status="online" data-userid="1" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user2_22.jpg" alt="">
                        <span>Cesar Mendoza</span>
                        <i class="icon-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="2" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user1_22.jpg" alt="">
                        <span>Yadra Abels</span>
                        <i class="icon-circle user-status offline"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Tobei" data-lastname="Tsumura" data-status="online" data-userid="3" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user4_22.jpg" alt="">
                        <span>Tobei Tsumura</span>
                        <i class="icon-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="John" data-lastname="Doe" data-status="offline" data-userid="4" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user3_22.jpg" alt="">
                        <span>John Doe</span>
                        <i class="icon-circle user-status offline"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Cesar" data-lastname="Mendoza" data-status="online" data-userid="1" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user2_22.jpg" alt="">
                        <span>Cesar Mendoza</span>
                        <i class="icon-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="2" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user1_22.jpg" alt="">
                        <span>Yadra Abels</span>
                        <i class="icon-circle user-status offline"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Tobei" data-lastname="Tsumura" data-status="online" data-userid="3" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user4_22.jpg" alt="">
                        <span>Tobei Tsumura</span>
                        <i class="icon-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="John" data-lastname="Doe" data-status="offline" data-userid="4" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user3_22.jpg" alt="">
                        <span>John Doe</span>
                        <i class="icon-circle user-status offline"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Cesar" data-lastname="Mendoza" data-status="online" data-userid="1" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user2_22.jpg" alt="">
                        <span>Cesar Mendoza</span>
                        <i class="icon-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="2" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user1_22.jpg" alt="">
                        <span>Yadra Abels</span>
                        <i class="icon-circle user-status offline"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Tobei" data-lastname="Tsumura" data-status="online" data-userid="3" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user4_22.jpg" alt="">
                        <span>Tobei Tsumura</span>
                        <i class="icon-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="John" data-lastname="Doe" data-status="offline" data-userid="4" href="facebook-timeline.html#">
                        <img src="<?php echo $view['global_var']['img_url']; ?>people-face/user3_22.jpg" alt="">
                        <span>John Doe</span>
                        <i class="icon-circle user-status offline"></i>
                    </a>
                </li>
            </ul>
            <form class="user-filter">
                <div class="input-prepend open">
                    <div class="btn-group dropup">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                        </button>
                        <ul class="dropdown-menu pull-left">
                            <li><a href="facebook-timeline.html#">Chat Sounds</a></li>
                            <li><a href="facebook-timeline.html#">Advanced Settings...</a></li>
                            <li class="divider"></li>
                            <li><a href="facebook-timeline.html#">Turn Off Chat</a></li>
                        </ul>
                    </div>
                    <input type="text" class="input-filter" placeholder="Search user...">
                </div>
            </form>
        </div>
    </div>
</aside>