<template>
	<div class="fh5co-blog-style-1">
		<div class="container">
			<div class="stepwizard col-md-offset-3">
				<div class="stepwizard-row setup-panel">
					<div class="stepwizard-step">
						<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
						<p>Step 1</p>
					</div>
					<div class="stepwizard-step">
						<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
						<p>Step 2</p>
					</div>
					<div class="stepwizard-step">
						<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
						<p>Step 3</p>
					</div>
				</div>
			</div>

			<form role="form" action="" method="post">
				<div class="row setup-content" id="step-1">
					<div class="col-xs-6 col-md-offset-3">
						<div class="col-md-12">
							<h3>Tentang data dirimu!</h3>
							<div class="form-group">
								<label class="control-label">Nama Lengkap</label>
								<input  maxlength="100" type="text" required="required" class="form-control" placeholder="Nama" v-model="nama"/>
							</div>
							<div class="form-group">
								<label class="control-label">Nomor HP</label>
								<input maxlength="100" type="text" required="required" class="form-control" placeholder="No Hp" v-model="no_telp"/>
							</div>
							<div class="form-group">
								<label class="control-label">Alamat</label>
								<textarea maxlength="100" type="text" required="required" class="form-control" placeholder="Alamat" v-model="alamat"/></textarea>
							</div>
							<!-- <div class="form-group">
								<label class="control-label">Provinsi</label>
								<div class="form-group">
									  <select class="form-control" required="required" style="margin-top: -25px; height: 42px;width: 100%;">
										   	  <option value="" disabled selected>Provinsi</option>
										<option value="1">Provinsi 1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									  </select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Kota</label>
								<div class="form-group">
									  <select class="form-control" required="required" style="margin-top: -25px; height: 42px;width: 100%;">
										   	  <option value="" disabled selected>Kota</option>
										<option value="1">Kota1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									  </select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Kecamatan</label>
								<div class="form-group">
									  <select class="form-control" required="required" style="margin-top: -25px; height: 42px;width: 100%;">
										<option value="" disabled selected>Kecamatan</option>
										<option value="1">Kecamatan 1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									  </select>
								</div>
							</div> -->

							<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
						</div>
					</div>
				</div>
				<div class="row setup-content" id="step-2">
					<div class="col-xs-6 col-md-offset-3">
						<div class="col-md-12">
							<h3>Gurumu</h3>
							<p>Berisikan informasi guru yang akan dipesan</p><br><br>
						</div>
					</div>
					<div class="col-xs-6 col-md-offset-3">
						<div class="col-md-12">
							<h3>Sesi Belajar</h3>
							<div class="form-group">
								<label class="control-label">Lama sesi Belajar</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Lama sesi" />
								<select class="form-control" v-model="sesi">
									<option value="" disabled selected>...</option>
									<option value="1"></option>
									<option value="2"></option>
									<option value="3"></option>
								</select>
							</div>
							<!-- <div class="form-group">
								<label class="control-label">Jam mulai</label>
								<input maxlength="200" type="text" required="required" class="form-control" placeholder="Jam"  />
							</div> -->
							<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
						</div>
					</div>

				</div>
				<div class="row setup-content" id="step-3">
					<div class="col-xs-6 col-md-offset-3">
						<div class="col-md-12">
							<h3>Review Pemesanan Guru</h3>
							<button class="btn btn-success btn-lg pull-right" type="submit" data-toggle="modal" data-target="#tunggu-modal">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>
<script>
export default{
	data(){
		return{
			nama:'',
			no_telp:'',
			alamat:'',
			sesi:'',	
		}
	}
}
</script>