<?php
/**
 * Homepage body: decision hero + all main sections.
 * Markup is a 1:1 port of index.html (lines 71–774).
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="decision-hero" aria-label="Search rankings">
    <div class="container">
      <h1>We Help You Make the Best Decisions.</h1>
      <form class="hero-search" role="search" action="#" method="get">
        <label class="visually-hidden" for="q">Search</label>
        <input id="q" name="q" type="search" placeholder="Find the best online learning" required>
        <button type="submit" aria-label="Search">
          <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3.5-3.5"></path></svg>
        </button>
      </form>
      <div class="hero-quick" aria-label="Popular rankings">
        <span class="rankings-shield" aria-hidden="true" title="Best U.S. News Rankings">
          <span class="rankings-shield__best">BEST</span>
          <span class="rankings-shield__brand">U.S. NEWS</span>
          <span class="rankings-shield__rank">RANKINGS</span>
        </span>
        <nav class="hero-quick__links">
          <a href="#education">Best Colleges</a>
          <a href="#health">Best Hospitals</a>
          <a href="#education">Best Graduate Schools</a>
          <a class="hero-quick__more" href="#more-from">+ More Rankings</a>
        </nav>
      </div>
    </div>
  </section>

  <main id="main">
    <!-- Top News: News You Can Use | Peek carousel | Most Popular -->
    <section class="top-news" id="news" aria-label="Top news">
      <div class="container top-grid">
        <aside class="news-use">
          <p class="news-use__title">News You Can Use</p>
          <ul class="story-list">
            <li>
              <h3><a href="#more-from">The FHA Could Drop 90-Day Rule</a></h3>
              <p>The Federal Housing Administration may scrap a rule that requires borrowers to wait three months after a short sale.</p>
              <p class="byline">By Jessica Merritt, Tracy Stewart and Whitney Blair Wyckoff</p>
            </li>
            <li>
              <h3><a href="#news">What Congress Aims to Pass Before Recess</a></h3>
              <p>Lawmakers are racing to advance must-pass spending bills before the August break.</p>
              <p class="byline">By Stella Garner</p>
            </li>
          </ul>
        </aside>

        <div class="feature-stage" data-carousel>
          <div class="feature-viewport">
            <div class="feature-track">
              <article class="feature-slide is-active">
                <div class="media"><img src="https://placehold.co/1200x800" alt="Featured story" width="1200" height="800"></div>
                <span class="slide-badge">Best Travel Rewards</span>
                <div class="caption">
                  <h2><a href="#more-from">Top Hotel and Airline Rewards Programs</a></h2>
                  <p>U.S. News announces the 2026-2027 Best Hotel Rewards Programs.</p>
                  <span class="credit">Getty Images</span>
                </div>
              </article>
              <article class="feature-slide">
                <div class="media"><img src="https://placehold.co/1200x800" alt="Featured story" width="1200" height="800"></div>
                <div class="caption">
                  <h2><a href="#news">Trump Economy Faces Affordability Woes</a></h2>
                  <p>President Donald Trump and Republicans are facing an uphill battle to convince Americans they are tackling high prices.</p>
                  <span class="credit">(Placeholder image)</span>
                </div>
              </article>
              <article class="feature-slide">
                <div class="media"><img src="https://placehold.co/1200x800" alt="Featured story" width="1200" height="800"></div>
                <div class="caption">
                  <h2><a href="#news">Tropical Storm Bertha: What to Know</a></h2>
                  <p>Inland near the Texas-Louisiana border with sustained winds of 45 mph.</p>
                  <span class="credit">(Placeholder image)</span>
                </div>
              </article>
              <article class="feature-slide">
                <div class="media"><img src="https://placehold.co/1200x800" alt="Featured story" width="1200" height="800"></div>
                <div class="caption">
                  <h2><a href="#news">How Trump Is Upending Green Cards</a></h2>
                  <p>Policy reforms are making green cards harder to get.</p>
                  <span class="credit">(Placeholder image)</span>
                </div>
              </article>
              <article class="feature-slide">
                <div class="media"><img src="https://placehold.co/1200x800" alt="Featured story" width="1200" height="800"></div>
                <div class="caption">
                  <h2><a href="#more-from">Best 0% APR Financing Car Deals</a></h2>
                  <p>Where shoppers can still find zero-interest auto financing offers.</p>
                  <span class="credit">(Placeholder image)</span>
                </div>
              </article>
            </div>
          </div>
          <div class="feature-controls">
            <button class="feature-nav feature-nav--prev" type="button" aria-label="Previous slide">â€¹</button>
            <div class="feature-dots" role="tablist" aria-label="Featured stories">
              <button type="button" class="is-active" aria-label="Slide 1"></button>
              <button type="button" aria-label="Slide 2"></button>
              <button type="button" aria-label="Slide 3"></button>
              <button type="button" aria-label="Slide 4"></button>
              <button type="button" aria-label="Slide 5"></button>
            </div>
            <button class="feature-nav feature-nav--next" type="button" aria-label="Next slide">â€º</button>
          </div>
        </div>

        <aside class="most-popular">
          <p class="col-title">Most Popular</p>
          <ul class="popular-list">
            <li><a href="#news">The Most Popular Dog Names in Each State</a></li>
            <li><a href="#more-from">Best 0% APR Financing Car Deals</a></li>
            <li><a href="#news">What to Know About Daylight Saving Time</a></li>
            <li><a href="#more-from">Most Beautiful River Cruise Itineraries</a></li>
            <li><a href="#news">The 10 Worst Presidents</a></li>
            <li><a href="#health">Severe Stomach Illness Spreading in U.S.</a></li>
            <li><a href="#health">Doctor Finder Data and Methodologies</a></li>
          </ul>
        </aside>
      </div>
    </section>

    <div class="ad-slot" aria-hidden="true">
      <img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy">
    </div>

    <!-- Newsletters -->
    <section class="newsletter-band" id="newsletters" aria-label="Newsletters">
      <div class="container">
        <div class="newsletter-row">
          <div class="newsletter-brand">
            <svg class="newsletter-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="M2 7l10 7 10-7"></path></svg>
            <h2>Newsletters</h2>
          </div>
          <div class="chips" data-chips>
            <button type="button" class="chip is-active">Getting In +</button>
            <button type="button" class="chip">Best Ahead +</button>
            <button type="button" class="chip">Decision Points +</button>
            <button type="button" class="chip">Invested +</button>
            <button type="button" class="chip chip--all">See All</button>
          </div>
          <form id="newsletter-form" class="newsletter-form">
            <label class="visually-hidden" for="email">Your Email</label>
            <input id="email" name="email" type="email" placeholder="Your Email" required>
            <button class="btn btn--navy" type="submit">Sign Up</button>
          </form>
        </div>
        <p class="newsletter-legal">By clicking â€œsign upâ€, you will receive the latest updates from U.S. News and you agree to our <a href="#footer">Terms and Conditions</a> and <a href="#footer">Privacy Policy</a>.</p>
        <p class="newsletter-note" data-success hidden>Thanks â€” you're on the list.</p>
      </div>
    </section>

    <!-- Feed trio: stories | data+quote | more stories -->
    <section class="section section--feed" aria-label="Stories and insights">
      <div class="container feed-trio">
        <div class="feed-list">
          <article class="feed-item">
            <a class="media media--thumb" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <div>
              <span class="kicker">Investing</span>
              <h3><a href="#more-from">7 Best ETFs to Invest in Corporate Bonds</a></h3>
              <p>Corporate bond ETFs can deliver attractive yields while helping diversify a portfolio beyond stocks.</p>
              <p class="byline">By Tony Dong and Jeff Reeves</p>
            </div>
          </article>
          <article class="feed-item">
            <a class="media media--thumb" href="#news"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <div>
              <span class="kicker">U.S. News Decision Points</span>
              <h3><a href="#news">A Strange and Scary Week in AI</a></h3>
              <p>From model launches to safety debates, the week raised new questions about AIâ€™s pace and power.</p>
              <p class="byline">By Susan Milligan</p>
            </div>
          </article>
          <article class="feed-item">
            <a class="media media--thumb" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <div>
              <span class="kicker">Investing</span>
              <h3><a href="#more-from">7 Best-Performing ETFs of 2026</a></h3>
              <p>Top-performing funds so far this year and what is driving their gains.</p>
              <p class="byline">By Jeff Reeves</p>
            </div>
          </article>
          <article class="feed-item">
            <a class="media media--thumb" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <div>
              <span class="kicker">Investing</span>
              <h3><a href="#more-from">Best Blue-Chip Stocks for Dividends</a></h3>
              <p>Stable companies with reliable payouts for income-focused investors.</p>
              <p class="byline">By Tony Dong</p>
            </div>
          </article>
          <article class="feed-item">
            <a class="media media--thumb" href="#news"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <div>
              <span class="kicker">National News</span>
              <h3><a href="#news">Tropical Storm Bertha: What to Know</a></h3>
              <p>Inland near the Texas-Louisiana border with sustained winds of 45 mph.</p>
              <p class="byline">By U.S. News Staff</p>
            </div>
          </article>
        </div>

        <div class="feed-widgets">
          <div class="data-block">
            <p class="mini-title">Data of the Day</p>
            <aside class="data-card">
              <div class="data-card__top">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16M7 16V9m5 7V5m5 11v-6"></path></svg>
                <p class="value">$1.2B</p>
              </div>
              <p>TikTok-driven health product sales highlight how social platforms shape consumer spending this year.</p>
              <a class="more-link" href="#more-from">Learn More â†’</a>
            </aside>
          </div>
          <aside class="quote-card">
            <span class="quote-mark quote-mark--open" aria-hidden="true">â€œ</span>
            <blockquote>This is a good moment to separate â€˜I want thisâ€™ from â€˜I need this,â€™ and that distinction saves real money.</blockquote>
            <span class="quote-mark quote-mark--close" aria-hidden="true">â€</span>
            <p class="quote-attr"><strong>Jeff Judge</strong><br>Certified Financial Planner and founder of a wealth advisory firm</p>
            <a class="more-link" href="#more-from">Learn more â†’</a>
          </aside>
        </div>

        <aside class="more-rail">
          <p class="mini-title">More Stories</p>
          <ul class="more-list">
            <li><a href="#more-from">Best Car Lease Deals</a></li>
            <li><a href="#more-from">Cars That Are Almost Self-Driving</a></li>
            <li><a href="#photos">D.C.â€™s Record-Breaking Fourth of July</a></li>
            <li><a href="#news">Worst Countries for Racial Equity</a></li>
            <li><a href="#more-from">Best Cell Phone Plans</a></li>
            <li><a href="#more-from">Best Travel Insurance Companies</a></li>
            <li><a href="#photos">Photos: Trump's State Fair</a></li>
            <li><a href="#more-from">Best Places to Retire</a></li>
            <li><a href="#education">How We Rank Colleges</a></li>
          </ul>
        </aside>
      </div>
    </section>

    <div class="ad-slot" aria-hidden="true">
      <img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy">
    </div>

    <!-- Health -->
    <section class="section section--tinted" id="health">
      <div class="container">
        <div class="section-head">
          <h2>Health</h2>
          <a class="view-all" href="#health">View All Health â†’</a>
        </div>
        <div class="health-grid">
          <div class="rankings-card">
            <p class="rankings-card__title">Health Rankings</p>
            <ul class="rankings-list">
              <li>
                <span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
                <div>
                  <h4><a href="#health">Best Hospitals</a></h4>
                  <p>Helping patients find the best healthcare for 30+ years.</p>
                </div>
              </li>
              <li>
                <span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
                <div>
                  <h4><a href="#health">Best Children's Hospitals</a></h4>
                  <p>Care for the sickest children.</p>
                </div>
              </li>
              <li>
                <span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
                <div>
                  <h4><a href="#health">Doctors</a></h4>
                  <p>Find the right doctor for you.</p>
                </div>
              </li>
              <li>
                <span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
                <div>
                  <h4><a href="#health">Best Senior Living</a></h4>
                  <p>Guidance when living at home is no longer ideal.</p>
                </div>
              </li>
            </ul>
            <a class="more-link" href="#health">More Rankings â†’</a>
          </div>

          <div class="feature-col">
            <article class="feature-panel">
              <div class="media"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></div>
              <div class="overlay">
                <span class="kicker kicker--gold">Senior Living</span>
                <h3><a href="#health">Senior Living Sizes</a></h3>
                <p>How to choose the right community size for care needs, social life and budget.</p>
              </div>
            </article>
            <article class="story-row">
              <a class="media media--thumb" href="#health"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
              <div>
                <span class="kicker">Medicare</span>
                <h4><a href="#health">Cost of Medicare Part D</a></h4>
                <p>New premium caps and coverage gaps are changing how much retirees pay for prescriptions.</p>
                <p class="byline">By Elaine K. Howley and Christine Comizio</p>
              </div>
            </article>
            <article class="story-row">
              <a class="media media--thumb" href="#health"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
              <div>
                <span class="kicker">Wellness</span>
                <h4><a href="#health">GLP-1s and Hair Loss: What to Know</a></h4>
                <p>Patients report thinning hair while on popular weight-loss medications.</p>
                <p class="byline">By Elaine K. Howley</p>
              </div>
            </article>
          </div>

          <aside class="latest-rail">
            <p class="mini-title">Latest Stories</p>
            <ul class="latest-list">
              <li>
                <span class="kicker">Medicare</span>
                <h4><a href="#health">Medigap Plans F vs. G vs. N</a></h4>
                <p>How popular supplemental plans compare on premiums, coverage and enrollment rules.</p>
              </li>
              <li>
                <span class="kicker">Wellness</span>
                <h4><a href="#health">Questions to Avoid Hospital Readmission</a></h4>
                <p>What to ask before discharge to reduce the chance of returning to the hospital.</p>
              </li>
              <li>
                <span class="kicker">Senior Living</span>
                <h4><a href="#health">Best Senior Living Options Near You</a></h4>
                <p>How to compare independent living, assisted living and memory care.</p>
              </li>
              <li>
                <span class="kicker">Doctors</span>
                <h4><a href="#health">Doctor Finder Data and Methodologies</a></h4>
                <p>How U.S. News evaluates and ranks physicians nationwide.</p>
              </li>
            </ul>
            <a class="more-link" href="#health">See All Stories â†’</a>
          </aside>
        </div>
      </div>
    </section>

    <!-- Education -->
    <section class="section section--tinted" id="education">
      <div class="container">
        <div class="section-head">
          <h2>Education</h2>
          <a class="view-all" href="#education">View All Education â†’</a>
        </div>
        <div class="health-grid">
          <div class="rankings-card">
            <p class="rankings-card__title">Education Rankings</p>
            <ul class="rankings-list">
              <li>
                <span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
                <div>
                  <h4><a href="#education">Best Colleges</a></h4>
                  <p>Rankings and advice to find the right college.</p>
                </div>
              </li>
              <li>
                <span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
                <div>
                  <h4><a href="#education">Best Graduate Schools</a></h4>
                  <p>Connect education to your career goals.</p>
                </div>
              </li>
              <li>
                <span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
                <div>
                  <h4><a href="#education">Best Online Colleges</a></h4>
                  <p>Flexible learning options you can trust.</p>
                </div>
              </li>
              <li>
                <span class="rankings-badge" aria-hidden="true"><span>BEST</span><span class="rb-brand">U.S. NEWS</span><span>RANKINGS</span></span>
                <div>
                  <h4><a href="#education">Global Universities</a></h4>
                  <p>Compare schools worldwide by research and reputation.</p>
                </div>
              </li>
            </ul>
            <a class="more-link" href="#education">More Rankings â†’</a>
          </div>

          <div class="feature-col">
            <article class="feature-panel">
              <div class="media"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></div>
              <div class="overlay">
                <span class="kicker kicker--gold">Applying to College</span>
                <h3><a href="#education">Should You Accelerate Your Degree?</a></h3>
                <p>Fast-track programs can save money, but they aren't the right fit for every student.</p>
              </div>
            </article>
            <article class="story-row">
              <a class="media media--thumb" href="#education"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
              <div>
                <span class="kicker">Applying to Business School</span>
                <h4><a href="#education">Online vs. On-Campus MBA Program</a></h4>
                <p>Weighing cost, flexibility and networking before you apply.</p>
                <p class="byline">By Sarah Wood</p>
              </div>
            </article>
            <article class="story-row">
              <a class="media media--thumb" href="#education"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
              <div>
                <span class="kicker">Getting In</span>
                <h4><a href="#education">How to Write a Strong College Essay</a></h4>
                <p>Admissions officers share what stands out in personal statements this cycle.</p>
                <p class="byline">By Cole Claybourn</p>
              </div>
            </article>
          </div>

          <aside class="latest-rail">
            <p class="mini-title">Latest Stories</p>
            <ul class="latest-list">
              <li>
                <span class="kicker">Medical School Admissions Doctor</span>
                <h4><a href="#education">The Med School Gap Year Question</a></h4>
                <p>Whether a gap year helps or hurts depends on how you spend the time.</p>
              </li>
              <li>
                <span class="kicker">Law Admissions Lowdown</span>
                <h4><a href="#education">How to Build a Strong Law School Resume</a></h4>
                <p>What admissions officers want to see beyond GPA and LSAT scores.</p>
              </li>
              <li>
                <span class="kicker">Getting In</span>
                <h4><a href="#education">The Best Tips From a Year of Getting In</a></h4>
                <p>Admissions advice that helped families navigate a competitive cycle.</p>
              </li>
              <li>
                <span class="kicker">Online Learning</span>
                <h4><a href="#education">Best Online Colleges for 2026</a></h4>
                <p>Flexible, accredited programs ranked by outcomes and support.</p>
              </li>
            </ul>
            <a class="more-link" href="#education">See All Stories â†’</a>
          </aside>
        </div>
      </div>
    </section>

    <!-- Photos -->
    <section class="section" id="photos">
      <div class="container">
        <div class="section-head">
          <h2>Photos</h2>
        </div>
        <div class="photos-grid">
          <a class="photo-hero" href="#photos">
            <div class="media media--wide"><img src="https://placehold.co/1200x800" alt="Photos You Should See" width="1200" height="800" loading="lazy"></div>
            <div class="overlay">
              <span class="kicker">Civic</span>
              <h3>Photos You Should See: July 2026</h3>
              <p class="meta">By Michael A. Brooks Â· July 21, 2026, at 2:45 p.m.</p>
            </div>
          </a>
          <div class="photo-stack">
            <a class="photo-thumb" href="#photos">
              <div class="media media--thumb"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></div>
              <div class="overlay">
                <span class="kicker">Civic</span>
                <h3>Photos: Best Countries Around the World</h3>
                <p class="meta">May 13, 2026, at 3:01 p.m.</p>
              </div>
            </a>
            <a class="photo-thumb" href="#photos">
              <div class="media media--thumb"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></div>
              <div class="overlay">
                <span class="kicker">Civic</span>
                <h3>Photos: Trump Behind the Scenes</h3>
                <p class="meta">June 26, 2026, at 5:54 p.m.</p>
              </div>
            </a>
          </div>
        </div>
        <a class="more-link" href="#photos" style="margin-top: var(--space-5); display: inline-flex;">See More Photo Galleries â†’</a>
      </div>
    </section>

    <div class="ad-slot" aria-hidden="true">
      <img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy">
    </div>

    <!-- More From -->
    <section class="section" id="more-from">
      <div class="container">
        <div class="section-head">
          <h2>More From U.S. News</h2>
        </div>
        <div class="topics-grid">
          <article class="topic-card">
            <div class="topic-head">
              <svg class="topic-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 2L11 13"></path><path d="M22 2L15 22 11 13 2 9 22 2"></path></svg>
              <span class="topic-label">Travel</span>
            </div>
            <a class="media" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <h3><a href="#more-from">Most Beautiful Landscapes in the World</a></h3>
            <ul class="chevron-list">
              <li><a href="#more-from">5 Best U.S. River Cruise Itineraries<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">Top Romantic River Cruise Lines<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">The Best Stonehenge Tours<span class="chev">â€º</span></a></li>
            </ul>
            <a class="more-link" href="#more-from">View More Travel â†’</a>
          </article>

          <article class="topic-card">
            <div class="topic-head">
              <svg class="topic-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2v20"></path><path d="M17 6H9.5a3 3 0 0 0 0 6h5a3 3 0 0 1 0 6H6"></path></svg>
              <span class="topic-label">Money</span>
            </div>
            <a class="media" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <h3><a href="#more-from">Student Loan Program Changes to Know</a></h3>
            <ul class="chevron-list">
              <li><a href="#more-from">Free Credit Monitoring Tool<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">Use Fixed Income to Fight Inflation<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">7 Best ETFs to Invest in Corporate Bonds<span class="chev">â€º</span></a></li>
            </ul>
            <a class="more-link" href="#more-from">View More Money â†’</a>
          </article>

          <article class="topic-card">
            <div class="topic-head">
              <svg class="topic-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 13l1.5-4.5A2 2 0 0 1 6.4 7h11.2a2 2 0 0 1 1.9 1.5L21 13"></path><rect x="2" y="13" width="20" height="6" rx="1"></rect><circle cx="7" cy="19" r="1.5"></circle><circle cx="17" cy="19" r="1.5"></circle></svg>
              <span class="topic-label">Autos</span>
            </div>
            <a class="media" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <h3><a href="#more-from">2027 Kia Seltos Photo Gallery</a></h3>
            <ul class="chevron-list">
              <li><a href="#more-from">When Is the Best Time to Buy a Car?<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">2027 Kia Seltos First Drive<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">All the Car Brands Available in America<span class="chev">â€º</span></a></li>
            </ul>
            <a class="more-link" href="#more-from">View More Autos â†’</a>
          </article>
        </div>

        <div class="ad-slot" aria-hidden="true">
          <img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy">
        </div>

        <div class="topics-grid">
          <article class="topic-card">
            <div class="topic-head">
              <svg class="topic-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 11l9-8 9 8"></path><path d="M5 10v10h14V10"></path></svg>
              <span class="topic-label">Real Estate</span>
            </div>
            <a class="media" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <h3><a href="#more-from">The Best Place to Live Is Carmel, IN</a></h3>
            <ul class="chevron-list">
              <li><a href="#more-from">Why Is Midland the Best Place to Retire?<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">How To Test A Neighborhood<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">Housing Market Index<span class="chev">â€º</span></a></li>
            </ul>
            <a class="more-link" href="#more-from">View More Real Estate â†’</a>
          </article>

          <article class="topic-card">
            <div class="topic-head">
              <svg class="topic-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"></path></svg>
              <span class="topic-label">Insurance</span>
            </div>
            <a class="media" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <h3><a href="#more-from">Best Car Insurance Companies</a></h3>
            <ul class="chevron-list">
              <li><a href="#more-from">Cheapest Car Insurance Companies of 2026<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">Best Homeowners Insurance Companies<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">Best Home and Auto Insurance Bundles<span class="chev">â€º</span></a></li>
            </ul>
            <a class="more-link" href="#more-from">View More Insurance â†’</a>
          </article>

          <article class="topic-card">
            <div class="topic-head">
              <svg class="topic-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="7" width="20" height="13" rx="2"></rect><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><path d="M2 12h20"></path></svg>
              <span class="topic-label">Careers</span>
            </div>
            <a class="media" href="#more-from"><img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy"></a>
            <h3><a href="#more-from">Best Companies to Work For</a></h3>
            <ul class="chevron-list">
              <li><a href="#more-from">The Best Jobs in America<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">Survey: Interns Want Growth Over Money<span class="chev">â€º</span></a></li>
              <li><a href="#more-from">Take a Career Assessment<span class="chev">â€º</span></a></li>
            </ul>
            <a class="more-link" href="#more-from">View More Careers â†’</a>
          </article>
        </div>
      </div>
    </section>

    <!-- News wire blocks -->
    <section class="section wire-section" aria-label="News wire">
      <div class="container">
        <div class="wire-grid">
          <div class="wire-card">
            <p class="wire-cat">Politics</p>
            <ul class="wire-list">
              <li><a href="#news">Democrats to Finalize Their 2028 Presidential Field Rules</a></li>
              <li><a href="#news">From Prison Fears to Fireworks: How Trump Changed July 4</a></li>
              <li><a href="#news">Federal Judges Allow New Tennessee Voting Map to Stand</a></li>
            </ul>
          </div>
          <div class="wire-card">
            <p class="wire-cat">Sports</p>
            <ul class="wire-list">
              <li><a href="#news">British Open Winner Ryan Fox Arrives as a Contender</a></li>
              <li><a href="#news">Rams Unveil Alternate Uniforms for the Season</a></li>
              <li><a href="#news">Kohles Shoots 62 to Take the 1st-Round Lead</a></li>
            </ul>
          </div>
          <div class="wire-card">
            <p class="wire-cat">Business</p>
            <ul class="wire-list">
              <li><a href="#more-from">Shares Skid in Asia in Sell-Off Over Rate Worries</a></li>
              <li><a href="#more-from">Prime Minister Carney Says Canada Will Stay Competitive</a></li>
              <li><a href="#more-from">Next Stop, Trump Station? Transit Renaming Debates</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <div class="ad-slot" aria-hidden="true">
      <img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy">
    </div>

    <section class="section wire-section" aria-label="News wire continued">
      <div class="container">
        <div class="wire-grid">
          <div class="wire-card">
            <p class="wire-cat">Health</p>
            <ul class="wire-list">
              <li><a href="#health">Senate Committee Postpones Vote on Health Package</a></li>
              <li><a href="#health">US Health Officials Are Investigating a Rise in Norovirus</a></li>
              <li><a href="#health">Famine Has Ended in Gaza, Aid Groups Say</a></li>
            </ul>
          </div>
          <div class="wire-card">
            <p class="wire-cat">Science</p>
            <ul class="wire-list">
              <li><a href="#news">FDA Panel Narrowly Backs New Drug Application</a></li>
              <li><a href="#news">Florida Researchers Bring Endangered Species Back</a></li>
              <li><a href="#news">Rei Ami From â€˜KPop Demon Huntersâ€™ Talks Science</a></li>
            </ul>
          </div>
          <div class="wire-card">
            <p class="wire-cat">Entertainment</p>
            <ul class="wire-list">
              <li><a href="#news">DNA Expert Ties 14-Year-Old Case to New Evidence</a></li>
              <li><a href="#news">Government Withdraws Subpoenas in Media Probe</a></li>
              <li><a href="#news">Salman Rushdie Testifies at the Terrorism Trial</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- App promo -->
    <section class="app-band" id="app">
      <div class="container app-promo">
        <div class="app-promo__copy">
          <h2>Unlock More, On-the-Go!</h2>
          <p>Experience the full power of U.S. News wherever you are. Download our app today for exclusive features, seamless access, and a personalized experience.</p>
          <div class="store-row">
            <a class="store-badge store-badge--apple" href="#app" aria-label="Download on the App Store">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16.4 12.7c0-2.1 1.7-3.1 1.8-3.2-1-1.4-2.5-1.6-3-1.6-1.3-.1-2.5.8-3.1.8-.7 0-1.7-.7-2.8-.7-1.4 0-2.8.9-3.5 2.2-1.5 2.6-.4 6.5 1.1 8.6.7 1 1.6 2.2 2.7 2.1 1.1 0 1.5-.7 2.8-.7s1.7.7 2.8.7c1.2 0 1.9-1 2.6-2 .8-1.2 1.1-2.3 1.1-2.4-.1 0-2.1-.8-2.1-3.2zM14.5 6.4c.6-.7 1-1.7.9-2.7-.9 0-1.9.6-2.5 1.3-.6.6-1.1 1.6-1 2.6 1 .1 1.9-.5 2.6-1.2z"></path></svg>
              <span>
                <small>Download on the</small>
                <strong>App Store</strong>
              </span>
            </a>
            <a class="store-badge store-badge--google" href="#app" aria-label="Get it on Google Play">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3.6 2.2l10.2 9.7L3.6 21.6c-.4-.3-.6-.8-.6-1.3V3.5c0-.5.2-1 .6-1.3zm11.3 10.8l2.4 2.3-9.7 5.6 7.3-7.9zm3.4-1.6l2.5 1.4c.7.4.7 1.4 0 1.8l-2.5 1.4-2.7-2.6 2.7-2zM7.6 2.4l9.7 5.6-2.4 2.3-7.3-7.9z"></path></svg>
              <span>
                <small>GET IT ON</small>
                <strong>Google Play</strong>
              </span>
            </a>
          </div>
        </div>
        <div class="app-phones" aria-hidden="true">
          <div class="phone phone--back">
            <div class="phone__screen">
              <img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy">
            </div>
          </div>
          <div class="phone phone--front">
            <div class="phone__screen">
              <img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy">
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="ad-slot" aria-hidden="true">
      <img src="https://placehold.co/1200x800" alt="" width="1200" height="800" loading="lazy">
    </div>
  </main>
