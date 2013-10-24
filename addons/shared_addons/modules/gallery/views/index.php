<div id="gallery-body">
{{ if albums}}
	{{ albums }}
		{{ if files }}
		<section class="photos" id="{{ slug }}-photos">
			<div class="container-fluid">
				<h3>{{ name }}</h3>
				<div class="row gallery-container">
					{{ files }}
					<div class="span3 item">
						<div class="panel">
							<img alt="{{ alt_attribute }}" src="{{ path }}" />
							<span>{{ description }}</span>
						</div>
					</div>
					{{ /files }}
				</div>
				<a class="readmore" href="{{ url:current }}#">+ view more</a>
			</div>
		</section>
		{{ endif }}
	{{ /albums }}
{{ else }}
<p>No albums have been uploaded.</p>
{{ endif }}
</div>
