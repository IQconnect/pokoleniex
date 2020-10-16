	@php
		$modal = $data['modal'];
	@endphp

@foreach($modal as $item)
		@php
			$img = $item['player']['image'];
			$name = $item['player']['name'];
			$nick = $item['player']['nick'];
			$number = $item['player']['number'];
			$position = $item['player']['position'];
			$club = $item['player']['club'];
			$wzrost = $item['player']['wzrost'];
			$best = $item['player']['best'];
			$rw = $item['player']['rw'];
			$pt2 = $item['player']['pt2'];
			$pt3 = $item['player']['pt3'];
			$zb = $item['player']['zb'];
			$pr = $item['player']['pr'];
			$as = $item['player']['as'];
			$bl = $item['player']['bl'];
@endphp

<section class="popup-flat" data-popup-flat="{{ $loop->index+1 }}">
	<div class="modal">
		<i data-close-popup="{{ $loop->index+1 }}" class="fas fa-times modal__close"></i>
			<div class="modal__avatar">
				{!! image($img['id'], 'full', 'modal__img') !!}
			</div>
			<div class="modal__content">
				<div class="modal__headline">
					Informacje o graczu
				</div>
				<h2 class="modal__name">
					{{ $name }}
				</h2>
				<div class="modal__title">
					{{ $nick }} #{{ $number }}
				</div>
				<table class="modal__tableinfo" >
					<tbody>
					<tr>
						<td>
							POZYCJA
						</td>
						<td>
							{{ $position }}
						</td>
					</tr>
					<tr>
						<td>
							WZROST
						</td>
						<td>
							{{ $wzrost }}
						</td>
					</tr>
					@if($club)
						<tr>
							<td>
								KLUB
							</td>
							<td>
								{{ $club }}
							</td>
						</tr>
					@endif
					<tr>
						<td>
							OSIĄGNIĘCIE
						</td>
						<td>
							{{ $best }}
						</td>
					</tr>
				</tbody>
				</table>
			</div>
			<div class="modal__statistic">
				<div class="modal__caption">
					Statystki
				</div>
					<table class="modal__table modal__table--stats">
						<tbody >

						<tr>
							<td>
								RW
							</td>
							<td class="modal__pt">
								{{ $rw }}
							</td>
						</tr>
					<tr>
						<td>
							2PKT.
						</td>
						<td class="modal__pt">
							{{ $pt2 }}
						</td>
					</tr>
					<tr>
						<td>
							3PKT.
						</td>
						<td class="modal__pt">
							{{ $pt3 }}
						</td>
					</tr>
					<tr>
						<td>
							ZB
						</td>
						<td class="modal__pt">
							{{ $zb }}
						</td>
					</tr>
					<tr>
						<td>
							PR
						</td>
						<td class="modal__pt">
							{{ $pr }}
						</td>
					</tr>
					<tr>
						<td>
							AS
						</td>
						<td class="modal__pt">
							{{ $as }}
						</td>
					</tr>
					<tr>
						<td>
							BL
						</td>
						<td class="modal__pt">
							{{ $bl }}
						</td>
					</tr>
				</tbody>
				</table>
	</div>
</div>
</section>
@endforeach
