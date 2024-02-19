package Class;

public class agent {
	private int id;
	private String first_name;
	private String last_name;
	private String email;
	private String telephone;
	private String adminid;
	private String managerid;
	public agent(int id, String first_name, String last_name, String email, String telephone, String admin_id,
			String manager_id) {
		super();
		this.id = id;
		this.first_name = first_name;
		this.last_name = last_name;
		this.email = email;
		this.telephone = telephone;
		this.adminid = admin_id;
		this.managerid = manager_id;
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
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getTelephone() {
		return telephone;
	}
	public void setTelephone(String telephone) {
		this.telephone = telephone;
	}
	public String getAdmin_id() {
		return adminid;
	}
	public void setAdmin_id(String admin_id) {
		this.adminid = admin_id;
	}
	public String getManager_id() {
		return managerid;
	}
	public void setManager_id(String manager_id) {
		this.managerid = manager_id;
	}
}
	
	
