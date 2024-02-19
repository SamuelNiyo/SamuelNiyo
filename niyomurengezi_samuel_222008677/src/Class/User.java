package Class;

public class User {
	private int id;
	private String first_name;
	private String last_name;
	private String tin_number;
	private String age;
	private String address;
	private String email;
	private String registration_date;
	private String agent_idString;
	public User(int id, String first_name, String last_name, String tin_number, String age, String address,
			String email, String registration_date, String agent_idString) {
		super();
		this.id = id;
		this.first_name = first_name;
		this.last_name = last_name;
		this.tin_number = tin_number;
		this.age = age;
		this.address = address;
		this.email = email;
		this.registration_date = registration_date;
		this.agent_idString = agent_idString;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getFirst_name() {
		return first_name;
	}
	public void setFirst_name(String first_name) {
		this.first_name = first_name;
	}
	public String getLast_name() {
		return last_name;
	}
	public void setLast_name(String last_name) {
		this.last_name = last_name;
	}
	public String getTin_number() {
		return tin_number;
	}
	public void setTin_number(String tin_number) {
		this.tin_number = tin_number;
	}
	public String getAge() {
		return age;
	}
	public void setAge(String age) {
		this.age = age;
	}
	public String getAddress() {
		return address;
	}
	public void setAddress(String address) {
		this.address = address;
	}
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getRegistration_date() {
		return registration_date;
	}
	public void setRegistration_date(String registration_date) {
		this.registration_date = registration_date;
	}
	public String getAgent_idString() {
		return agent_idString;
	}
	public void setAgent_idString(String agent_idString) {
		this.agent_idString = agent_idString;
	}
}