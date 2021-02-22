<!--<div class="bottom_side_info">-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <a href="#">{{ isset($contact_1->field_value)? $contact_1->field_value:''}}</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">{{ isset($contact_2->field_value)? $contact_2->field_value:''}}</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">{{ isset($contact_3->field_value)? $contact_3->field_value:''}}</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">{{ isset($website_email->field_value)? $website_email->field_value:''}}</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->




 <div class="side_animation_wrapper moved" id="sideout">
        <div class="sidemenu_cancel">
            <a href="#">
                <!--<img src="{{ url('public/assets/images/phreshfarm_img/cancel.png')}}" alt="">-->
                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
            </a>
        </div>
        <div class="side_menu_list">
            <ul>
                <li>
                    <a href="{{ url('/')}}">Home</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="https://phreshfarms.ng/about/" target="_blank">About</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="https://phreshfarms.ng/why-phresh-farms" target="_blank">Why Phresh Farms</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="https://phreshfarms.ng/investments" target="_blank">Investments</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="https://store.phreshfarms.ng/about/" target="_blank">Store</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="https://phreshfarms.ng/faq" target="_blank">FAQ</a>
                    <span class="rj"></span>
                </li>
                <li>
                    <a href="https://phreshfarms.ng/contact" target="_blank">Contact Us</a>
                    <span class="rj"></span>
                </li>
            </ul>
        </div>
            <!-- <div class="bottom_side_info">
                <ul>
                    <li>
                        <a href="#">123-456-789-0</a>
                    </li>
                    <li>
                        <a href="#">123-456-789-0</a>
                    </li>
                    <li>
                        <a href="#">123-456-789-0</a>
                    </li>
                    <li>
                        <a href="#">info@phreshfarm.com</a>
                    </li>
                </ul>
            </div> -->

           <div class="bottom_side_info">
            <ul>
               <li>
                    <!--<a href="#"> info@phreshfarms.ng </a>-->
                    <a href="#">{{ isset($website_email->field_value)? $website_email->field_value:''}}</a>
                </li>
                <li>
                    <!--<a href="#"> +2349073612624 </a>-->
                     <a href="#">{{ isset($contact_1->field_value)? $contact_1->field_value:''}}</a>
                </li>
                <li style="margin-top: 5px;">
                    <a href="{{ isset($facebook->field_value)? $facebook->field_value:''}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="{{ isset($tweeter->field_value)? $tweeter->field_value:''}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="{{ isset($instagram->field_value)? $instagram->field_value:''}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
               
            </ul>
        </div>
            <div class="side_pf_copyright">
                <p>© COPYRIGHT PHRESH FARMS 2020</p>
            </div>
        
    </div>
