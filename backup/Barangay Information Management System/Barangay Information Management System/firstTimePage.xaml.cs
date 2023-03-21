using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;
using MySql.Data.MySqlClient;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for firstTimePage.xaml
    /// </summary>
    public partial class firstTimePage : Window
    {

        String username;
        String fullName;

        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        public firstTimePage()
        {
            InitializeComponent();

            //getting username of current Account
            SqlConnection getCurrentAccountIDConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getCurrentAccountIDConnection.Open();
            SqlCommand getCurrentAccountIDCMD = new SqlCommand();
            getCurrentAccountIDCMD.Connection = getCurrentAccountIDConnection;
            getCurrentAccountIDCMD.CommandText = "SELECT * FROM currentAccount WHERE id = 1";
            getCurrentAccountIDCMD.ExecuteNonQuery();

            SqlDataReader getCurrentAccountIDDR = getCurrentAccountIDCMD.ExecuteReader();
            while (getCurrentAccountIDDR.Read())
            {
                username = getCurrentAccountIDDR.GetValue(1).ToString();
            }
            getCurrentAccountIDDR.Close();
            getCurrentAccountIDConnection.Close();


            //getting info of current Account
            SqlConnection getCurrentAccountInfoConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getCurrentAccountInfoConnection.Open();
            SqlCommand getCurrentAccountInfoCMD = new SqlCommand();
            getCurrentAccountInfoCMD.Connection = getCurrentAccountInfoConnection;
            getCurrentAccountInfoCMD.CommandText = "SELECT * FROM accounts WHERE username = @username";
            getCurrentAccountInfoCMD.Parameters.AddWithValue("@username", username);
            getCurrentAccountInfoCMD.ExecuteNonQuery();

            SqlDataReader getCurrentAccountInfoDR = getCurrentAccountInfoCMD.ExecuteReader();
            while (getCurrentAccountInfoDR.Read())
            {
                fullName = getCurrentAccountInfoDR.GetValue(3).ToString();
            }
            getCurrentAccountInfoDR.Close();
            getCurrentAccountIDConnection.Close();

            userName.Content = fullName;


        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            if(barangay.Text == "")
            {
                MessageBox.Show(this, "Barangay should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                barangay.BorderBrush = Brushes.Red;
                barangay.BorderThickness = new Thickness(2);
                barangay.Focus();
            }

            else
            {
                //update barangay

                string updateBarangay = "UPDATE barangay SET barangay_name=@barangay WHERE barangay_id='1'";
                connection.Open();
                SqlCommand updateBarangaycmd = new SqlCommand(updateBarangay, connection);
                updateBarangaycmd.Parameters.AddWithValue("@barangay", barangay.Text);
                SqlDataAdapter updateBarangayda = new SqlDataAdapter(updateBarangaycmd);
                DataTable updateBarangaydt = new DataTable();
                updateBarangayda.Fill(updateBarangaydt);
                connection.Close();

                menuPage menuPageWindow = new menuPage();
                menuPageWindow.Show();
                this.Close();

            }
        }
    }
}
