<link rel="stylesheet" href="/assets/css/reset.css">
	<link rel="stylesheet" href="/assets/css/projects/nephy.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
			<main style="font-family:'游ゴシック', sans-serif">
				<div class="content">
					<section class="left" id="left-section">
						<div class="left-content">
							<img class="demo-img" src="/assets/img/projects/nephy.png" />
						</div>
					</section>
					<section class="right" id="right-seciton">
						<div class="right-content">
							<h2>Nephy</h2>
							<article class="right-content-info" id="intoro">
								<h3>Intro</h3>
								<p>New Twitter cliant by Nephy Project team.</p>
								<ul>
									<li>
										<a href="https://github.com/NephyProject/Nephy">
											<img src="https://img.shields.io/badge/Version-Deveroping-yellow.svg">
											</a>
									</li>
									<li>
										<a href="https://github.com/NephyProject/Nephy/wiki/ライセンス">
											<img src="https://img.shields.io/badge/License-MIT-blue.svg">
											</a>
									</li>
								</ul>
							</article>
							<article class="right-content-info" id="github">
								<h3>Github</h3>
								<div class="latest-commit">
									<div v-for="record in commits">
										<h4>Latest Commit:</h4>
										<p>
											<a  style="color:#5d5d5d" :href="record.html_url" target="_blank" class="commit">{{record.sha.slice(0, 7)}}</a> - <span class="message">{{record.commit.message | truncate}}</span>
										</p>
										<p>
											by <span class="author">{{record.commit.author.name}}</span> at <span class="date">{{record.commit.author.date | formatDate}}</span>
										</p>
									</div>
								</div>
								<a  style="color:#5d5d5d" class="btn" href="https://github.com/NephyProject/Nephy">
									<i class="fa fa-github"></i>View Code
								</a>
								<!--<ul>
								<li><iframe src="https://ghbtns.com/github-btn.html?user=NephyProject&repo=Nephy&type=watch&count=true" frameborder="0" scrolling="no" width="80" height="20"></iframe></li>
								<li><iframe src="https://ghbtns.com/github-btn.html?user=NephyProject&repo=Nephy&type=fork&count=true" frameborder="0" scrolling="no" width="80" height="20"></iframe></li>
							</ul>-->
							</article>
							<article class="right-content-info" id="link">
								<h3>Link</h3>
								<ul>
									<li>
										<p>
											<a style="color:#5d5d5d" href="http://nephy.jp/index_alt.html">Product Page</a>
										</p>
									</li>
								</ul>
							</article>
						</div>
					</section>
				</div>
			</main>
			<script type="text/javascript" src="https://cdn.jsdelivr.net/vue/latest/vue.js"></script>
			<script type='text/javascript'>
				window.onload = function () {
				var apiURL = 'https://api.github.com/repos/nephyproject/nephy/commits?per_page=1&sha='
				var lastest = new Vue({
				el: '.latest-commit',
				data: {
				currentBranch: 'master',
				commits: null
				},
				created: function () {
				this.fetchData()
				},
				watch: {
				currentBranch: 'fetchData'
				},
				filters: {
				truncate: function (v) {
				var newline = v.indexOf('\n')
				return newline > 0 ? v.slice(0, newline) : v
				},
				formatDate: function (v) {
				return v.replace(/T|Z/g, ' ')
				}
				},
				methods: {
				fetchData: function () {
				var xhr = new XMLHttpRequest()
				var self = this
				xhr.open('GET', apiURL + self.currentBranch)
				xhr.onload = function () {
				self.commits = JSON.parse(xhr.responseText)
				}
				xhr.send()
				}
				}
				})
				}
			</script>
		