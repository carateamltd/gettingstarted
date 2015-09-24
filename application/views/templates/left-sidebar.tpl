<!-- BEGIN SIDEBAR -->
<div class="leftpanel">
	<div class="leftmenu"> 
    	<ul class="nav nav-tabs nav-stacked">
        	<li class="nav-header">Navigation</li>
        	{if $data['user_info']['iRoleId'] neq '1'}
            <li class="sub-menu {if strpos($data.tpl_name,'home') !== false }active{/if}">
              <a class="" href="{$data.base_url}home">
                  <i class="icon-dashboard"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Dashboard'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          {/if}
          {if $data['user_info']['iRoleId'] eq '1'}
          <li class="sub-menu {if strpos($data.tpl_name,'administrator') !== false }active{/if}">
              <a href="{$data.base_url}administrator" class="">
                  <i class="icon-user"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Administrator'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
                  <!--<span class="arrow"></span>-->
              </a>
          </li>
          <!-- 
<li class="sub-menu {if strpos($data.tpl_name,'-app') !== false }active{/if}">
              <a href="{$data.base_url}app" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Application Design'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'configuration') !== false }active{/if}">
              <a href="{$data.base_url}configuration" class="">
                  <i class="icon-gear"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Configuration'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'cms') !== false }active{/if}">
              <a href="{$data.base_url}cms" class="">
                  <i class="icon-wrench"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'CMS'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'-notification') !== false }active{/if}">
              <a href="{$data.base_url}notification" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Push Notification'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
                  <!~~<span class="arrow"></span>~~>
              </a>
          </li>
 -->
          {else}
          <li class="sub-menu {if strpos($data.tpl_name,'-app') !== false }active{/if}">
              <a href="{$data.base_url}app" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Application Design'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'-notification') !== false }active{/if}">
              <a href="{$data.base_url}notification" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Push Notification'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
                  <!--<span class="arrow"></span>-->
              </a>
          </li>
          <!--<li class="sub-menu {if strpos($data.tpl_name,'-resturantinfo') !== false }active{/if}">
              <a href="{$data.base_url}administrator/update/" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Basic Info'}
                           {$val.rField}
                         {/if}
                       {/foreach}</span>
                  
              </a>
          </li> -->
        {/if}
        </ul>
    </div>
</div>



<!--<div class="sidebar-scroll">
    <div id="sidebar" class="nav-collapse collapse">-->
    
     <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
<!--     <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
           <input type="text" class="search-query" placeholder="Search" />
        </form>
     </div>-->
     <!-- END RESPONSIVE QUICK SEARCH FORM -->
     <!-- BEGIN SIDEBAR MENU -->
<!--      <ul class="sidebar-menu">
          <li class="sub-menu {if strpos($data.tpl_name,'home') !== false }active{/if}">
              <a class="" href="{$data.base_url}home">
                  <i class="icon-dashboard"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Dashboard'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          {if $data['user_info']['iRoleId'] eq '1'}
          <li class="sub-menu {if strpos($data.tpl_name,'administrator') !== false }active{/if}">
              <a href="{$data.base_url}administrator" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Administrator'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>-->
                  <!--<span class="arrow"></span>-->
            <!--  </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'-app') !== false }active{/if}">
              <a href="{$data.base_url}app" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Application Design'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'configuration') !== false }active{/if}">
              <a href="{$data.base_url}configuration" class="">
                  <i class="icon-wrench"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Configuration'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'cms') !== false }active{/if}">
              <a href="{$data.base_url}cms" class="">
                  <i class="icon-wrench"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'CMS'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          {else}
          <li class="sub-menu {if strpos($data.tpl_name,'-app') !== false }active{/if}">
              <a href="{$data.base_url}app" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Application Design'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>
              </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'-notification') !== false }active{/if}">
              <a href="{$data.base_url}notification" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Push Notification'}
                            {$val.rField}
                         {/if}
                       {/foreach}</span>-->
                  <!--<span class="arrow"></span>-->
<!--              </a>
          </li>
          <li class="sub-menu {if strpos($data.tpl_name,'-resturantinfo') !== false }active{/if}">
              <a href="{$data.base_url}resturantinfo" class="">
                  <i class="icon-book"></i>
                  <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Basic Info'}
                           {$val.rField}
                         {/if}
                       {/foreach}</span>-->
                  <!--<span class="arrow"></span>-->
     <!--         </a>
          </li>
        {/if}
       
      </ul>-->
     <!-- END SIDEBAR MENU -->
<!--    </div>
</div>-->
<!-- END SIDEBAR -->
