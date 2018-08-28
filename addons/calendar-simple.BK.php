

<div id="dsa-cal-app" v-cloak>
        <div class="intro-section-header">Upcoming Events</div>
            <ul id="events-calendar">
                <li v-for="event in calEvents.slice(0, 5)" itemscope itemtype="http://schema.org/Event"> <!-- clamp to 5 for the widget -->
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
    </div>

    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Calendar-specific stuff -->
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="/css/events.css" /> -->
	<!--
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/library/js/main.6bf9d8ec.js"></script>
    -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/library/js/manifest.2ae2e69a05c33dfc65f8.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/library/js/vendor.6680367ded8e1c0ca3f0.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/library/js/app.6e573df67ed86dccc1f3.js"></script>
