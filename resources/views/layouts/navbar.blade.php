<style>

.ghulam-ali-btn-custom
{   
   color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: fit-content;
    margin: auto;
	padding: 12px !important;
    margin-top: 7px;
	gap: 10px;
  }

</style>

<div class="color-bg">
		<div class="sidebar__toggle" data-toggle="sidebar">
			<a class="open-toggle" href="javascript:void(0);"><i class="fe fe-menu"></i></a>
		</div>
		<ul class="nav navbar-nav">
			<li class="nav-item mr-8"><form method="POST" action="{{ route('logout') }}">
				@csrf
				<button type="submit" class="btn btn-success ghulam-ali-btn-custom" style="color: white"><span class="material-symbols-outlined" style="font-size: 21px;">
					logout
					</span> Logout</button>
			  </form></li>
			
		</ul>
	</div>