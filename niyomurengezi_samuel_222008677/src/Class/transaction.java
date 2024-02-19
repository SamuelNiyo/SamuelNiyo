package Class;

public class transaction {
	private int id;
	private int user_id;
	private int revenue_id;
	public transaction(int id, int user_id, int revenue_id) {
		super();
		this.id = id;
		this.user_id = user_id;
		this.revenue_id = revenue_id;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public int getUser_id() {
		return user_id;
	}
	public void setUser_id(int user_id) {
		this.user_id = user_id;
	}
	public int getRevenue_id() {
		return revenue_id;
	}
	public void setRevenue_id(int revenue_id) {
		this.revenue_id = revenue_id;
	}
}