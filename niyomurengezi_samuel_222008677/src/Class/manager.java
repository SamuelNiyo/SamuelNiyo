package Class;

public class manager {

		private int Id;
		private String First_name;
		private String Last_name;
		private String Address;
		private String Specialization;
		public manager(int id, String first_name, String last_name, String address, String specialization) {
			super();
			Id = id;
			First_name = first_name;
			Last_name = last_name;
			Address = address;
			Specialization = specialization;
		}
		public int getId() {
			return Id;
		}
		public void setId(int id) {
			Id = id;
		}
		public String getFirst_name() {
			return First_name;
		}
		public void setFirst_name(String first_name) {
			First_name = first_name;
		}
		public String getLast_name() {
			return Last_name;
		}
		public void setLast_name(String last_name) {
			Last_name = last_name;
		}
		public String getAddress() {
			return Address;
		}
		public void setAddress(String address) {
			Address = address;
		}
		public String getSpecialization() {
			return Specialization;
		}
		public void setSpecialization(String specialization) {
			Specialization = specialization;
		}
}