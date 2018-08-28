			<div class="intro-section-header">Upcoming Events</div>
            <ul id="events-calendar">
			
				<?php if($limitNumEvents == true){ ?>
				<li v-for="event in calEvents.slice(0, 5)" itemscope itemtype="http://schema.org/Event">
				<? } else { ?>
				<li v-for="event in calEvents" itemscope itemtype="http://schema.org/Event"> 
				<? }; ?>
                
                    <meta itemprop="startDate" content="{{ event.theStart }}">
                    <div class="thedate">
                        <span class="day">{{ event.prettyStartTime.day }}</span> 
                        <span class="month">{{ event.prettyStartTime.month }}</span>
                        <span class="date"> {{ event.prettyStartTime.date }}</span>
                        <span class="time" v-if="event.hasStartTime"> 
                            <span> {{ event.prettyStartTime.time }} {{ event.prettyStartTime.ampm }} </span>
                            <span v-if="event.hasEndTime"> - {{ event.prettyEndTime.time }} {{ event.prettyEndTime.ampm }} </span>
                        </span>
                    </div>
                                            
                    <div itemprop="name" class="name">{{ event.summary }}</div>
                    <div class="location">{{ event.location }}</div>
                    <div class="description" itemprop="description" v-html="event.description"></div>

                    <script type='application/ld+json'> 
                        {
                          "@context": "http://www.schema.org",
                          "@type": "Event",
                          "name": "{{ event.summary }}",
                          "description": "{{ event.description }}",
                          "startDate": "{{ event.startTime }}",
                          "endDate": "{{ event.endTime }}",
                          "location": {
                            "@type": "Place",
                            "name": "{{ event.location }}",
                            "address": "{{ event.location }}"
                          }
                        }
                    </script>


                </li>
            </ul>
            <div id="errors" v-if="showErrors">
                Something went wrong- if you're seeing this, please let us know on <a href='https://www.facebook.com/NewOrleansDSA/'>Facebook</a> or the <a href='https://twitter.com/neworleansdsa'>Twitters</a>!
            </div>
