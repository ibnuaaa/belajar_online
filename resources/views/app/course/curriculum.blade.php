


					<h4 class="edu_title">Course Circullum</h4>
					<div id="accordionExample" class="accordion shadow circullum">


						@foreach ($section as $key => $val)
						<!-- Part 1 -->
						<div class="card">
							<div id="headingOne" class="card-header bg-white shadow-sm border-0">
							<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">{{ $val->name }}</a></h6>
							</div>
							<div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
							<div class="card-body pl-3 pr-3">
								<ul class="lectures_lists">
									@foreach ($val->lecture as $key2 => $val2)
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i><a href="/f/lecture/{{ $val2->id }}">{{ $val2->name }}</a></div></li>
									<li class="unview" style="display:none;"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
									@endforeach
								</ul>
							</div>
							</div>
						</div>
						@endforeach



					</div>
