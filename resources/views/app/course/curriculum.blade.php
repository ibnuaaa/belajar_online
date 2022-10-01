


					<h4 class="edu_title">Materi Pembelajaran</h4>
					<div id="accordionExample" class="accordion shadow circullum">

						<?php $no_section = 0; ?>
						@foreach ($section as $key => $val)
						@if(empty($lecture->section->id) || $lecture->section->id == $val->id)
						<!-- Part 1 -->
						<div class="card">
							<div id="headingOne" class="card-header bg-white shadow-sm border-0">
							<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">{{ $val->name }}</a></h6>
							</div>
							<div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
							<div class="card-body pl-3 pr-3">
								<ul class="lectures_lists">
									
									<?php
											$is_open = false;
									?>

									@foreach ($val->lecture as $key2 => $val2)

									<?php									
											if (!empty($val2->my_lecture)) $is_open = true;
											if (!empty($val->lecture[$key2 - 1]->my_lecture)) $is_open = true;

											// if ($no_section === 0)
											$is_open = true;

											$no_section++;
									?>
									
									@if ($is_open)
										<li><div class="lectures_lists_title"><i class="ti-control-play"></i><a href="/f/lecture/{{ $val2->id }}">{{ $val2->name }}</a></div></li>
									@else
										<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>{{ $val2->name }}</div></li>
									@endif

									<?php
											$is_open = false;
									?>
									
									@endforeach
								</ul>
							</div>
							</div>
						</div>
						@endif
						@endforeach



					</div>
